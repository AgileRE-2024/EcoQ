<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (Auth::user()->role == 'admin') {
            return view('dashboard.profile.index', compact('user'));
        } else if (Auth::user()->role == 'garden_owner') {
            $garden = Auth::user()->garden;
            return view('dashboard.profile.index', compact(['garden', 'user']));
        }
    }
    /**
     * Display the user's profile form.
     */
    public function edit(): View
    {
        $user = Auth::user();
        if (Auth::user()->role == 'admin') {
            return view('dashboard.profile.edit', compact('user'));
        } else if (Auth::user()->role == 'garden_owner') {
            $garden = Auth::user()->garden;

            return view('dashboard.profile.edit', compact(['garden', 'user']));
        }
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        $request->user()->save();

        if ($request->user()->role == 'garden_owner') {
            $request->user()->garden->fill([
                'name' => $request->input('garden_name'),
                'location' => $request->input('garden_location'),
                'description' => $request->input('garden_description'),
            ]);
            $request->user()->garden->save();
        }

        return Redirect::route('profile.index')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
