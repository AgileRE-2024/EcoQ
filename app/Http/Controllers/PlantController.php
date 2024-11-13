<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlantRequest;
use App\Http\Requests\UpdatePlantRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
            $imageName = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $request->name . '_' . time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images/plants/', $imageName);
            }


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
            ]);

            $plant->classification()->create([
                'kingdom' => $request->kingdom,
                'division' => $request->division,
                'class' => $request->class,
                'order' => $request->order,
                'family' => $request->family,
                'genus' => $request->genus,
                'species' => $request->species,
            ]);

            $plant->pharmacologyAspect()->create([
                'toxicity' => $request->toxicity,
                'contraindications' => $request->contraindications,
                'side_effects' => $request->side_effects,
                'warnings' => $request->warnings,
                'precautions' => $request->precautions,
            ]);

            if (is_array($request->parts)) {
                foreach ($request->parts as $part) {
                    $plant->partUsed()->create([
                        'part' => $part['part'],
                        'usage' => $part['usage'], // typo diperbaiki
                    ]);
                }
            }

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
        return view('dashboard.plants.edit', compact('plant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlantRequest $request, Plant $plant)
    {
        //
        if (!Auth::user()->role == 'garden_owner' || $plant->garden_id != Auth::user()->garden->id) {
            return redirect()->route('plants.index');
        }

        $request->validated();

        try {
            $imageName = $plant->image;
            if ($request->hasFile('image')) {
                if ($imageName) {
                    Storage::delete('public/images/plants/' . $imageName);
                }
                $image = $request->file('image');
                $imageName = $request->name . '_' . time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images/plants/', $imageName);
            }

            $plant->update([
                'name' => $request->name,
                'common_name' => $request->common_name,
                'scientific_name' => $request->scientific_name,
                'description' => $request->description,
                'habitat' => $request->habitat,
                'chemical_compounds' => $request->chemical_compounds,
                'image' => $imageName,
            ]);

            $plant->classification()->update([
                'kingdom' => $request->kingdom,
                'division' => $request->division,
                'class' => $request->class,
                'order' => $request->order,
                'family' => $request->family,
                'genus' => $request->genus,
                'species' => $request->species,
            ]);

            $plant->pharmacologyAspect()->update([
                'toxicity' => $request->toxicity,
                'contraindications' => $request->contraindications,
                'side_effects' => $request->side_effects,
                'warnings' => $request->warnings,
                'precautions' => $request->precautions,
            ]);


            $plant->partUsed()->delete();
            if (is_array($request->parts)) {
                foreach ($request->parts as $part) {
                    $plant->partUsed()->create([
                        'part' => $part['part'],
                        'usage' => $part['usage'], // typo diperbaiki
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
