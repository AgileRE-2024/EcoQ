@extends('dashboard.layouts.template')

@section('content')
    <div class="bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="max-w-3xl w-full bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Profile</h2>

            <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Name Input -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email Input -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                @if ($user->role == 'garden_owner')
                    <!-- Garden Information -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Garden Information</h3>

                        <!-- Garden Name -->
                        <div>
                            <label for="garden_name" class="block text-sm font-medium text-gray-700">Garden Name</label>
                            <input type="text" name="garden_name" id="garden_name"
                                value="{{ old('garden_name', $garden->name) }}"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                required>
                            @error('garden_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Garden Location -->
                        <div>
                            <label for="garden_location" class="block text-sm font-medium text-gray-700">Garden
                                Location</label>
                            <input type="text" name="garden_location" id="garden_location"
                                value="{{ old('garden_location', $garden->location) }}"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                required>
                            @error('garden_location')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Garden Description -->
                        <div>
                            <label for="garden_description" class="block text-sm font-medium text-gray-700">Garden
                                Description</label>
                            <textarea name="garden_description" id="garden_description" rows="4"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('garden_description', $garden->description) }}</textarea>
                            @error('garden_description')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                @endif

                <!-- Submit Button -->
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('profile.index') }}"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-md transition duration-200 transform hover:scale-105">
                        Back
                    </a>
                    <button type="reset"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-md transition duration-200 transform hover:scale-105">
                        Reset
                    </button>
                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md shadow-md transition duration-200 transform hover:scale-105">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
