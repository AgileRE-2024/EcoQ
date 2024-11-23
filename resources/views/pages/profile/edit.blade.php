@extends('layouts.app')
@section('content')
    <div class="min-h-screen bg-gradient-to-br from-green-50 via-emerald-50/50 to-teal-50/30 py-24">
        <div class="container mx-auto px-4">
            <!-- Back Button -->
            <div class="mb-6">
                <a href="{{ route('profile.index') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-green-100 text-green-600 hover:bg-green-200 hover:text-green-700 transition-colors duration-300 rounded-lg shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span>Back to Profile</span>
                </a>
            </div>

            <!-- Edit Profile Form -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="p-8">
                    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Profile</h1>

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-8">
                        @csrf
                        @method('PUT')

                        <!-- Profile Image Section -->
                        <div class="space-y-4">
                            <label class="block text-sm font-medium text-gray-700">Profile Photo</label>
                            <div class="flex items-center gap-6">
                                <div class="relative">
                                    <div class="w-24 h-24 rounded-2xl overflow-hidden ring-4 ring-green-100">
                                        <img id="preview-image"
                                            src="{{ $user->image ? asset('storage/images/users/' . $user->image) : asset('assets/images/default.png') }}"
                                            alt="{{ $user->name }}" class="w-full h-full object-cover">
                                    </div>
                                </div>
                                <div class="flex-1 space-y-2">
                                    <label class="block">
                                        <span class="sr-only">Choose profile photo</span>
                                        <input type="file" name="image" id="image" accept="image/*"
                                            class="block w-full text-sm text-gray-500
                                                  file:mr-4 file:py-2 file:px-4
                                                  file:rounded-full file:border-0
                                                  file:text-sm file:font-semibold
                                                  file:bg-green-50 file:text-green-700
                                                  hover:file:bg-green-100
                                                  transition-all duration-300"
                                            onchange="previewImage(this)">
                                    </label>
                                    <p class="text-sm text-gray-500">PNG, JPG or GIF (MAX. 2MB)</p>
                                    @error('image')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Personal Information Section -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div class="space-y-2">
                                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                                    class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm
                                          focus:border-green-500 focus:ring-green-500 transition-colors duration-300"
                                    required>
                                @error('name')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="space-y-2">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                                    class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm
                                          focus:border-green-500 focus:ring-green-500 transition-colors duration-300"
                                    disabled>
                                @error('email')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="space-y-2">
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone) }}"
                                    class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm
                                          focus:border-green-500 focus:ring-green-500 transition-colors duration-300">
                                @error('phone')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Date of Birth -->
                            <div class="space-y-2">
                                <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of
                                    Birth</label>
                                <input type="date" id="date_of_birth" name="date_of_birth"
                                    value="{{ old('date_of_birth', $user->date_of_birth?->format('Y-m-d')) }}"
                                    class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm
                                          focus:border-green-500 focus:ring-green-500 transition-colors duration-300">
                                @error('date_of_birth')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Address -->
                            <div class="space-y-2 md:col-span-2">
                                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                <textarea id="address" name="address" rows="3"
                                    class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm
                                             focus:border-green-500 focus:ring-green-500 transition-colors duration-300">{{ old('address', $user->address) }}</textarea>
                                @error('address')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-end gap-4 pt-6 border-t">
                            <button type="button" onclick="window.location.href='{{ route('profile.index') }}'"
                                class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-xl
                                       hover:bg-gray-50 transition-colors duration-300">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-6 py-2.5 bg-green-600 text-white rounded-xl
                                       hover:bg-green-700 transition-colors duration-300
                                       flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('preview-image').src = e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
