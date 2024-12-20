<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Garden;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (Auth::user()->role == 'admin') {
            $events = Event::paginate(5);
            $gardens = Garden::all();
            return view('dashboard.events.index', compact('events', 'gardens'));
        } else if (Auth::user()->role == 'garden_owner') {
            $events = Event::where('garden_id', Auth::user()->garden->id)->paginate(5);
            return view('dashboard.events.index', compact('events'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (!Auth::user()->role == 'garden_owner') {
            return redirect()->route('events.index');
        }
        return view('dashboard.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        //
        $request->validated();

        try {
            $imageName = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $request->name . '_' . time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images/events/', $imageName);
            }

            $event = Event::create([
                'title' => $request->title,
                'description' => $request->description,
                'date' => $request->date,
                'time' => $request->time,
                'location' => $request->location,
                'image' => $imageName,
                'garden_id' => $request->garden_id,
            ]);

            if (is_array($request->images)) {
                foreach ($request->images as $index => $image) {
                    $imageName = $request->name . '-' . $index . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/images/events/', $imageName);
                    $event->images()->create([
                        'image_url' => $imageName,
                    ]);
                }
            }

            return redirect()->route('events.index')->with('status', 'event-created');
        } catch (\Exception $e) {
            return redirect()->route('events.index')->with('status', 'event-not-created');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
        return view('dashboard.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
        if (!Auth::user()->role == 'garden_owner') {
            return redirect()->route('events.index');
        }

        return view('dashboard.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        abort_if(
            Auth::user()->role != 'garden_owner',
            403,
            'Unauthorized action'
        );

        $request->validated();

        try {
            // Update gambar utama jika ada
            $imageName = $event->image;
            if ($request->hasFile('image')) {
                if ($imageName) {
                    Storage::delete('public/images/events/' . $imageName);
                }

                // Simpan file thumbnail baru
                $thumbnail = $request->file('image');
                $imageName = $request->name . '_thumbnail_' . time() . '.' . $thumbnail->getClientOriginalExtension();
                $thumbnail->storeAs('public/images/events/', $imageName);
            }

            // Update data event
            $event->update([
                'title' => $request->title,
                'description' => $request->description,
                'date' => $request->date,
                'time' => $request->time,
                'location' => $request->location,
                'image' => $imageName,
                'garden_id' => $request->garden_id,
            ]);

            $additionalImages = $event->images;

            if ($request->has('images')) {
                foreach ($additionalImages as $image) {
                    // Hapus file dari storage
                    Storage::delete('public/images/events/' . $image->image_url);
                }
                // Hapus data gambar event dari database
                $event->images()->delete();
            }

            // Tambahkan gambar event baru hanya jika 'images' ada pada request
            if ($request->has('images') && is_array($request->images)) {
                foreach ($request->images as $index => $image) {
                    $imageName = $request->name . '-' . $index . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/images/plants/', $imageName);
                    $event->images()->create([
                        'image_url' => $imageName,
                    ]);
                }
            }

            return redirect()->route('events.index')->with('success', 'Event updated successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage()); // Log the error message
            return redirect()->back()->with('error', 'Failed to update event');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
