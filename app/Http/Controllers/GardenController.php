<?php

namespace App\Http\Controllers;

use App\Models\Garden;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGardenRequest;
use App\Http\Requests\UpdateGardenRequest;
use Illuminate\Support\Facades\Auth;

class GardenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (Auth::user()->role == 'admin') {
            $gardens = Garden::paginate(5);
            return view('dashboard.gardens.index', compact('gardens'));
        } else if (Auth::user()->role == 'garden_owner') {
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGardenRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Garden $garden)
    {
        //
        if (Auth::user()->role != 'admin') {
            return redirect()->route('gardens.index');
        }
        return view('dashboard.gardens.show', compact('garden'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Garden $garden)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGardenRequest $request, Garden $garden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Garden $garden)
    {
        //
    }
}
