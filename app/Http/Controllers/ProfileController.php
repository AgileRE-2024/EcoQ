<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
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
        }
        return view('dashboard.profile.edit', compact(['garden', 'user']));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {


        $request->validated();
        if (Auth::user()->role == 'garden_owner') {
            try {
                $user = Auth::user();

                // Update user profile
                $userImage = $user->image;
                if ($request->hasFile('image')) {
                    $userImage = $this->handleFileUpload(
                        $request,
                        'image',
                        'public/images/users/',
                        $user->image
                    );
                }
                $user->update([
                    'name' => $request->user_name,
                    'phone' => $request->user_phone,
                    'address' => $request->user_address,
                    'date_of_birth' => $request->date_of_birth,
                    'image' => $userImage,
                ]);

                // Update garden profile
                $garden = $user->garden;
                $gardenImage = $garden->image;
                if ($request->hasFile('garden_image')) {
                    $gardenImage = $this->handleFileUpload(
                        $request,
                        'garden_image',
                        'public/images/gardens/',
                        $garden->image
                    );
                }

                $garden->update([
                    'name' => $request->garden_name,
                    'location' => $request->garden_location,
                    'description' => $request->garden_description,
                    'phone_number' => $request->garden_phone,
                    'image' => $gardenImage,
                    'open_time' => $request->open_time,
                    'close_time' => $request->close_time,
                ]);

                // Update additional images for garden
                if ($request->has('images')) {
                    // Delete old images
                    foreach ($garden->images as $image) {
                        Storage::delete('public/images/plants/' . $image->image_url);
                    }
                    $garden->images()->delete();

                    // Save new images
                    foreach ($request->file('images') as $index => $image) {
                        $imageName = $this->generateUniqueFileName($image, $request->garden_name . '-' . $index);
                        $image->storeAs('public/images/plants/', $imageName);
                        $garden->images()->create(['image_url' => $imageName]);
                    }
                }

                return redirect()->route('profile.index')->with('status', 'Profile updated successfully');
            } catch (\Exception $e) {
                Log::error('Profile update failed: ' . $e->getMessage());
                return redirect()->route('profile.edit')->with('error', 'Error updating profile');
            }
        } else {
            try {
                $user = Auth::user();

                // Update user profile
                $userImage = $user->image;
                if ($request->hasFile('image')) {
                    $userImage = $this->handleFileUpload(
                        $request,
                        'image',
                        'public/images/users/',
                        $user->image
                    );
                }
                $user->update([
                    'name' => $request->user_name,
                    'phone' => $request->user_phone,
                    'address' => $request->user_address,
                    'date_of_birth' => $request->date_of_birth,
                    'image' => $userImage,
                ]);

                return redirect()->route('profile.index')->with('status', 'Profile updated successfully');
            } catch (\Exception $e) {
                Log::error('Profile update failed: ' . $e->getMessage());
                return redirect()->route('profile.edit')->with('error', 'Error updating profile');
            }
        }
    }

    /**
     * Handle file upload and return the new file name.
     */
    private function handleFileUpload($request, $fieldName, $path, $existingFile = null): ?string
    {
        if ($request->hasFile($fieldName)) {
            if ($existingFile) {
                Storage::delete($path . $existingFile);
            }
            $file = $request->file($fieldName);
            $fileName = $this->generateUniqueFileName($file, $request->input('name', 'file'));
            $file->storeAs($path, $fileName);
            return $fileName;
        }
        return $existingFile;
    }

    /**
     * Generate a unique file name using UUID.
     */
    private function generateUniqueFileName($file, $prefix = ''): string
    {
        $extension = $file->getClientOriginalExtension();
        return $prefix . '-' . uniqid() . '.' . $extension;
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
