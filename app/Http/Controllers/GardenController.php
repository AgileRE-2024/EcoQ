<?php

namespace App\Http\Controllers;

use App\Models\Garden;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGardenRequest;
use App\Http\Requests\UpdateGardenRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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
        if (Auth::user()->role == 'admin') {
            return view('dashboard.gardens.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGardenRequest $request)
    {
        //
        if (Auth::user()->role == 'admin') {
            $request->validated();

            try {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'phone' => $request->phone,
                    'date_of_birth' => $request->date_of_birth,
                    'address' => $request->address,
                    'role' => 'garden_owner',
                ]);

                Garden::create([
                    'name' => $request->name,
                    'address' => $request->address,
                    'user_id' => $user->id,
                ]);

                return redirect()->route('gardens.index')->with('success', 'Garden created successfully');
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                return redirect()->route('gardens.create')->with('error', $e->getMessage());
            }
        } else {
            return redirect()->route('gardens.index')->with('error', ' You are not authorized to create a garden');
        }
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
