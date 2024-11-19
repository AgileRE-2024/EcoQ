<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Support\Facades\Auth;

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
            return view('dashboard.events.index', compact('events'));
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
        return view('dashboard.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
