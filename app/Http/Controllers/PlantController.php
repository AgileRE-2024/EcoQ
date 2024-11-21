<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Kingdom;
use App\Models\Phylum;
use App\Models\PlantClass;
use App\Models\Order;
use App\Models\Family;
use App\Models\Genus;
use App\Models\Species;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlantRequest;
use App\Http\Requests\UpdatePlantRequest;
use DeepCopy\f001\B;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use SimpleQrcode;



class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $plants = Plant::paginate(5);
            return view('dashboard.plants.index', compact('plants'));
        } else if (Auth::user()->role == 'garden_owner') {
            $plants = Plant::where('garden_id', Auth::user()->garden->id)->paginate(5);
            return view('dashboard.plants.index', compact('plants'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (!Auth::user()->role == 'garden_owner') {
            return redirect()->route('plants.index');
        }
        return view('dashboard.plants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlantRequest $request)
    {
        $request->validated();

        try {
            // Upload gambar utama
            $imageName = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $request->name . '_' . time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images/plants/', $imageName);
            }

            // Tangani taksonomi berjenjang
            $kingdom = Kingdom::firstOrCreate(['name' => $request->kingdom]);
            $phylum = Phylum::firstOrCreate(['name' => $request->phylum, 'kingdom_id' => $kingdom->id]);
            $class = PlantClass::firstOrCreate(['name' => $request->class, 'phylum_id' => $phylum->id]); // Rename "Class" karena reserved word
            $order = Order::firstOrCreate(['name' => $request->order, 'class_id' => $class->id]);
            $family = Family::firstOrCreate(['name' => $request->family, 'order_id' => $order->id]);
            $genus = Genus::firstOrCreate(['name' => $request->genus, 'family_id' => $family->id]);
            $species = Species::firstOrCreate(['name' => $request->species, 'genus_id' => $genus->id]);

            // Buat tanaman baru
            $plant = Plant::create([
                'name' => $request->name,
                'common_name' => $request->common_name,
                'scientific_name' => $request->scientific_name,
                'description' => $request->description,
                'habitat' => $request->habitat,
                'chemical_compounds' => $request->chemical_compounds,
                'image' => $imageName,
                'qr_image' => null,
                'garden_id' => Auth::user()->garden->id,
                'species_id' => $species->id,
            ]);

            // Tambahkan aspek farmakologi
            $plant->pharmacologyAspect()->create([
                'toxicity' => $request->toxicity,
                'contraindications' => $request->contraindications,
                'side_effects' => $request->side_effects,
                'warnings' => $request->warnings,
                'precautions' => $request->precautions,
            ]);

            // Tambahkan bagian yang digunakan (jika ada)
            if (is_array($request->parts)) {
                foreach ($request->parts as $part) {
                    $plant->partUseds()->create([
                        'part' => $part['part'],
                        'usage' => $part['usage'],
                    ]);
                }
            }

            // Upload gambar tambahan (jika ada)
            if (is_array($request->images)) {
                foreach ($request->images as $index => $image) {
                    $imageName = $request->name . '-' . $index . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/images/plants/', $imageName);
                    $plant->images()->create([
                        'image_url' => $imageName,
                    ]);
                }
            }

            // Generate QR Code
            $qrCodeData = route('plant', $plant->id); // URL halaman detail tanaman
            $qrCodePath = 'images/qr_codes/plant_' . $plant->id . '.png'; // Path untuk menyimpan QR code
            $builder = new Builder(
                writer: new PngWriter(),
                writerOptions: [],
                validateResult: false,
                data: $qrCodeData,
                encoding: new Encoding('UTF-8'),
                errorCorrectionLevel: ErrorCorrectionLevel::High,
                size: 200, // Ukuran QR Code
                margin: 10, // Margin
                roundBlockSizeMode: RoundBlockSizeMode::Margin
            );

            $result = $builder->build();
            $result->saveToFile(public_path('storage/' . $qrCodePath));

            // Update path QR code di database
            $plant->update(['qr_image' => $qrCodePath]);

            return redirect()->route('plants.index')->with('success', 'Plant created successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage()); // Log the error message
            return redirect()->back()->with('error', 'Failed to create plant');
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(Plant $plant)
    {
        //
        if (Auth::user()->role == 'admin' || (Auth::user()->role == 'garden_owner' && $plant->garden_id == Auth::user()->garden->id)) {
            $plant = Plant::with('species.genus.family.order.class.phylum.kingdom')->findOrFail($plant->id);

            return view('dashboard.plants.show', compact('plant'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plant $plant)
    {
        //
        if (!Auth::user()->role == 'garden_owner' || $plant->garden_id != Auth::user()->garden->id) {
            return redirect()->route('plants.index');
        }
        $plant = Plant::with('species.genus.family.order.class.phylum.kingdom')->findOrFail($plant->id);

        return view('dashboard.plants.edit', compact('plant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlantRequest $request, Plant $plant)
    {
        abort_if(
            Auth::user()->role != 'garden_owner' || $plant->garden_id != Auth::user()->garden->id,
            403,
            'Unauthorized action'
        );

        $request->validated();

        try {
            // Update gambar utama jika ada
            $imageName = $plant->image;
            if ($request->hasFile('image')) {
                if ($imageName) {
                    Storage::delete('public/images/plants/' . $imageName);
                }

                // Simpan file thumbnail baru
                $thumbnail = $request->file('image');
                $imageName = $request->name . '_thumbnail_' . time() . '.' . $thumbnail->getClientOriginalExtension();
                $thumbnail->storeAs('public/images/plants/', $imageName);
            }

            // Update data tanaman
            $plant->update([
                'name' => $request->name,
                'common_name' => $request->common_name,
                'scientific_name' => $request->scientific_name,
                'description' => $request->description,
                'habitat' => $request->habitat,
                'chemical_compounds' => $request->chemical_compounds,
                'image' => $imageName,
            ]);

            // Update klasifikasi taksonomi
            $kingdom = Kingdom::firstOrCreate(['name' => $request->kingdom]);
            $phylum = Phylum::firstOrCreate(['name' => $request->phylum, 'kingdom_id' => $kingdom->id]);
            $class = PlantClass::firstOrCreate(['name' => $request->class, 'phylum_id' => $phylum->id]);
            $order = Order::firstOrCreate(['name' => $request->order, 'class_id' => $class->id]);
            $family = Family::firstOrCreate(['name' => $request->family, 'order_id' => $order->id]);
            $genus = Genus::firstOrCreate(['name' => $request->genus, 'family_id' => $family->id]);
            $species = Species::firstOrCreate(['name' => $request->species, 'genus_id' => $genus->id]);

            $plant->update(['species_id' => $species->id]);

            // Update aspek farmakologi
            $plant->pharmacologyAspect()->update([
                'toxicity' => $request->toxicity,
                'contraindications' => $request->contraindications,
                'side_effects' => $request->side_effects,
                'warnings' => $request->warnings,
                'precautions' => $request->precautions,
            ]);

            // Hapus bagian yang digunakan sebelumnya
            $plant->partUseds()->delete();

            // Tambahkan bagian yang digunakan baru
            if ($request->has('parts') && is_array($request->parts)) {
                foreach ($request->parts as $part) {
                    if (!empty($part['part']) && !empty($part['usage'])) {
                        $plant->partUseds()->create([
                            'part' => $part['part'],
                            'usage' => $part['usage'],
                        ]);
                    }
                }
            }

            $additionalImages = $plant->images;

            if ($request->has('images')) {
                foreach ($additionalImages as $image) {
                    // Hapus file dari storage
                    Storage::delete('public/images/plants/' . $image->image_url);
                }
                // Hapus data gambar tambahan dari database
                $plant->images()->delete();
            }

            // Tambahkan gambar tambahan baru hanya jika 'images' ada pada request
            if ($request->has('images') && is_array($request->images)) {
                foreach ($request->images as $index => $image) {
                    $imageName = $request->name . '-' . $index . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/images/plants/', $imageName);
                    $plant->images()->create([
                        'image_url' => $imageName,
                    ]);
                }
            }

            return redirect()->route('plants.index')->with('success', 'Plant updated successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage()); // Log the error message
            return redirect()->back()->with('error', 'Failed to update plant');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plant $plant)
    {
        //
        if (!Auth::user()->role == 'garden_owner' || $plant->garden_id != Auth::user()->garden->id) {
            return redirect()->route('plants.index');
        }

        try {
            if ($plant->image) {
                Storage::delete('public/images/plants/' . $plant->image);
            }
            $plant->delete();
            return redirect()->route('plants.index')->with('success', 'Plant deleted successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage()); // Log the error message
            return redirect()->back()->with('error', 'Failed to delete plant');
        }
    }
}
