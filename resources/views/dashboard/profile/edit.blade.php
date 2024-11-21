@extends('dashboard.layouts.template')

@section('content')
    <div class="bg-gradient-to-br from-green-50 via-emerald-100 to-lime-100 min-h-screen p-6">
        <div class="max-w-7xl mx-auto">
            <div class="relative bg-white bg-opacity-80 rounded-2xl shadow-2xl overflow-hidden">
                <!-- Leaf Decorations -->
                <div class="absolute top-0 left-0 w-32 h-32 bg-[url('/images/leaf-pattern.svg')] bg-cover opacity-20"></div>
                <div
                    class="absolute bottom-0 right-0 w-32 h-32 bg-[url('/images/leaf-pattern.svg')] bg-cover opacity-20 transform rotate-180">
                </div>

                <div class="p-10 relative z-10">
                    <!-- Breadcrumb with Nature-Inspired Icons -->
                    <nav class="mb-8" aria-label="Breadcrumb">
                        <ol class="flex items-center space-x-3 text-sm">
                            <li class="flex items-center">
                                <a href="{{ route('dashboard') }}"
                                    class="text-green-700 hover:text-green-900 flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z" />
                                </svg>
                            </li>
                            <li class="flex items-center">
                                <a href="{{ route('profile.index') }}" class="text-green-700 hover:text-green-900">
                                    Profile
                                </a>
                            </li>
                            <li>
                                <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z" />
                                </svg>
                            </li>
                            <li class="text-green-900 font-semibold">Edit</li>
                        </ol>
                    </nav>

                    <h1 class="text-4xl font-bold text-green-900 mb-8 flex items-center">
                        <svg class="w-10 h-10 mr-4 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5.882V19.24a1.76 1.76 0 001.317 1.697l6.434 1.625A1.75 1.75 0 0021 20.825V5.893c0-1.224-1.224-2.023-2.373-1.6L12 5.5l-6.627-1.207C4.224 3.87 3 4.669 3 5.893v14.932a1.75 1.75 0 002.249 1.697l6.434-1.625A1.75 1.75 0 0013 19.24V5.882c0-.648-.526-1.097-1.157-.957L12 5.5l-.843-.575z" />
                        </svg>
                        Edit Profile & Garden
                    </h1>

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-10">
                        @csrf
                        @method('PUT')

                        <!-- Personal Information Section -->
                        <div class="bg-white/60 rounded-xl p-6 border border-green-100 shadow-sm">
                            <h2 class="text-2xl font-semibold text-green-800 mb-6 border-b border-green-200 pb-3">
                                <svg class="w-6 h-6 inline-block mr-3 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Personal Information
                            </h2>
                            <div class="bg-gradient-to-br from-green-50 to-emerald-100 p-8 rounded-2xl shadow-lg relative">
                                <div class="absolute inset-x-0 top-0 -translate-y-1/2 flex justify-center">
                                    <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-green-300 shadow-lg">
                                        <img id="currentImage"
                                            src="{{ $user->image ? asset('storage/images/users/' . $user->image) : asset('assets/images/default.png') }}"
                                            alt="Current Profile Image" class="w-full h-full object-cover">
                                    </div>
                                </div>
                                <div class="grid md:grid-cols-2 gap-6 mt-16">
                                    <!-- Decorative Leaf Accent -->
                                    <div class="absolute top-4 right-4 opacity-20">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"
                                            class="text-green-600">
                                            <path d="M12 21a9 9 0 0 0 9-9 9 9 0 1 0 -9 9Z" />
                                            <path d="M3 3c0 9 3 12 9 12" />
                                        </svg>
                                    </div>

                                    <!-- Name Input with Botanical Border -->
                                    <div class="relative group">
                                        <label for="user_name"
                                            class="text-sm font-medium text-green-900 mb-2 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                class="mr-2 text-green-600">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                                <circle cx="12" cy="7" r="4" />
                                            </svg>
                                            Name
                                        </label>
                                        <input type="text" name="user_name" id="user_name"
                                            value="{{ old('user_name', $user->name) }}"
                                            class="w-full px-4 py-3 border-2 border-green-200 rounded-xl focus:border-emerald-400 focus:ring-4 focus:ring-emerald-200 transition duration-300 bg-white/60 hover:bg-white/80 placeholder-green-400">
                                    </div>

                                    <!-- Email Input with Leaf Border -->
                                    <div class="relative group">
                                        <label for="email"
                                            class="text-sm font-medium text-green-900 mb-2 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                class="mr-2 text-green-600">
                                                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                                <path d="M12 7v5l3 3" />
                                            </svg>
                                            Email
                                        </label>
                                        <input type="email" name="email" id="email"
                                            value="{{ old('email', $user->email) }}"
                                            class="w-full px-4 py-3 border-2 border-green-200 rounded-xl focus:border-emerald-400 focus:ring-4 focus:ring-emerald-200 transition duration-300 bg-white/60 hover:bg-white/80 placeholder-green-400"
                                            disabled>
                                    </div>

                                    <!-- Phone Input with Stem Border -->
                                    <div class="relative group">
                                        <label for="user_phone"
                                            class="text-sm font-medium text-green-900 mb-2 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                class="mr-2 text-green-600">
                                                <path d="M3 8l1.5 5h1.5l1.5 -5" />
                                                <path d="M9 8l1.5 5h1.5l1.5 -5" />
                                                <path d="M15 8l1.5 5h1.5l1.5 -5" />
                                            </svg>
                                            Phone
                                        </label>
                                        <input type="tel" name="user_phone" id="user_phone"
                                            value="{{ old('user_phone', $user->phone) }}"
                                            class="w-full px-4 py-3 border-2 border-green-200 rounded-xl focus:border-emerald-400 focus:ring-4 focus:ring-emerald-200 transition duration-300 bg-white/60 hover:bg-white/80 placeholder-green-400">
                                    </div>

                                    <!-- Address Input with Tree Border -->
                                    <div class="relative group">
                                        <label for="user_address"
                                            class="text-sm font-medium text-green-900 mb-2 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                class="mr-2 text-green-600">
                                                <path
                                                    d="M7 21l3 -3h7a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2v3l2 -2z" />
                                                <path d="M7 10v-3a5 5 0 0 1 10 0v3" />
                                            </svg>
                                            Address
                                        </label>
                                        <input type="text" name="user_address" id="user_address"
                                            value="{{ old('user_address', $user->address) }}"
                                            class="w-full px-4 py-3 border-2 border-green-200 rounded-xl focus:border-emerald-400 focus:ring-4 focus:ring-emerald-200 transition duration-300 bg-white/60 hover:bg-white/80 placeholder-green-400">
                                    </div>

                                    <!-- Date of Birth Input with Flower Border -->
                                    <div class="relative group">
                                        <label for="date_of_birth"
                                            class="text-sm font-medium text-green-900 mb-2 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                class="mr-2 text-green-600">
                                                <path
                                                    d="M12 8a2 2 0 0 0 2 -2a2 2 0 0 0 -2 -2a2 2 0 0 0 -2 2a2 2 0 0 0 2 2" />
                                                <path
                                                    d="M12 12a2 2 0 0 0 2 -2a2 2 0 0 0 -2 -2a2 2 0 0 0 -2 2a2 2 0 0 0 2 2" />
                                            </svg>
                                            Date of Birth
                                        </label>
                                        <input type="date" name="date_of_birth" id="date_of_birth"
                                            value="{{ old('date_of_birth', $user->date_of_birth) }}"
                                            class="w-full px-4 py-3 border-2 border-green-200 rounded-xl focus:border-emerald-400 focus:ring-4 focus:ring-emerald-200 transition duration-300 bg-white/60 hover:bg-white/80 text-green-800 placeholder-green-400">
                                    </div>

                                    <!-- Profile Image Input with Petal Border -->
                                    <div class="relative group">
                                        <label for="image"
                                            class="text-sm font-medium text-green-900 mb-2 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                class="mr-2 text-green-600">
                                                <path d="M15 8h.01" />
                                                <rect x="4" y="4" width="16" height="16" rx="3" />
                                                <path d="M4 15l4 -4a3 5 0 0 1 3 0l5 5" />
                                                <path d="M14 14l1 -1a3 5 0 0 1 3 0l2 2" />
                                            </svg>
                                            Profile Image
                                        </label>
                                        <div class="flex items-center space-x-4">
                                            <input type="file" name="image" id="image" accept="image/*"
                                                class="w-full px-4 py-3 border-2 border-green-200 rounded-xl focus:border-emerald-400 focus:ring-4 focus:ring-emerald-200 transition duration-300 bg-white/60 hover:bg-white/80"
                                                onchange="previewImage(event)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if (Auth::user()->role == 'garden_owner')

                            <!-- Garden Information Section -->
                            <div
                                class="bg-gradient-to-br from-green-50 to-emerald-100 rounded-2xl p-8 border border-green-100 shadow-lg">
                                <h2
                                    class="text-3xl font-bold text-green-900 mb-6 pb-3 border-b-2 border-green-200 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mr-4 text-green-600"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Garden Information
                                </h2>

                                <!-- Decorative Leaf Background -->
                                <div class="absolute top-4 right-4 opacity-20">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"
                                        class="text-green-600">
                                        <path d="M12 21a9 9 0 0 0 9-9 9 9 0 1 0 -9 9Z" />
                                        <path d="M3 3c0 9 3 12 9 12" />
                                    </svg>
                                </div>

                                <div class="grid md:grid-cols-2 gap-6">
                                    <!-- Garden Name -->
                                    <div class="relative group">
                                        <label for="garden_name"
                                            class="text-sm font-medium text-green-900 mb-2 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                class="mr-2 text-green-600">
                                                <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z" />
                                                <line x1="4" y1="22" x2="4" y2="15" />
                                            </svg>
                                            Garden Name
                                        </label>
                                        <input type="text" name="garden_name" id="garden_name"
                                            value="{{ old('garden_name', $user->garden->name ?? '') }}"
                                            class="w-full px-4 py-3 border-2 border-green-200 rounded-xl focus:border-emerald-400 focus:ring-4 focus:ring-emerald-200 transition duration-300 bg-white/60 hover:bg-white/80 placeholder-green-400">
                                    </div>

                                    <!-- Garden Location -->
                                    <div class="relative group">
                                        <label for="garden_location"
                                            class="text-sm font-medium text-green-900 mb-2 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                class="mr-2 text-green-600">
                                                <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                                <path
                                                    d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.243 -4.243a8 8 0 1 1 11.314 0z" />
                                            </svg>
                                            Garden Location
                                        </label>
                                        <input type="text" name="garden_location" id="garden_location"
                                            value="{{ old('garden_location', $user->garden->location ?? '') }}"
                                            class="w-full px-4 py-3 border-2 border-green-200 rounded-xl focus:border-emerald-400 focus:ring-4 focus:ring-emerald-200 transition duration-300 bg-white/60 hover:bg-white/80 placeholder-green-400">
                                    </div>

                                    <!-- Garden Description (Full Width) -->
                                    <div class="relative group col-span-2">
                                        <label for="garden_description"
                                            class="text-sm font-medium text-green-900 mb-2 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                class="mr-2 text-green-600">
                                                <path d="M4 13.5 l3 3l7 -7l3 3" />
                                                <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                            </svg>
                                            Garden Description
                                        </label>
                                        <textarea name="garden_description" id="garden_description" rows="4"
                                            class="w-full px-4 py-3 border-2 border-green-200 rounded-xl focus:border-emerald-400 focus:ring-4 focus:ring-emerald-200 transition duration-300 bg-white/60 hover:bg-white/80 placeholder-green-400">{{ old('garden_description', $user->garden->description ?? '') }}</textarea>
                                    </div>

                                    <!-- Garden Phone Number -->
                                    <div class="relative group">
                                        <label for="garden_phone"
                                            class="text-sm font-medium text-green-900 mb-2 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                class="mr-2 text-green-600">
                                                <path
                                                    d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                                            </svg>
                                            Garden Phone Number
                                        </label>
                                        <input type="tel" name="garden_phone" id="garden_phone"
                                            value="{{ old('garden_phone', $user->garden->phone_number ?? '') }}"
                                            class="w-full px-4 py-3 border-2 border-green-200 rounded-xl focus:border-emerald-400 focus:ring-4 focus:ring-emerald-200 transition duration-300 bg-white/60 hover:bg-white/80 placeholder-green-400">
                                    </div>

                                    <!-- Garden Image -->
                                    <div class="relative group">
                                        <label for="garden_image"
                                            class="text-sm font-medium text-green-900 mb-2 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                class="mr-2 text-green-600">
                                                <rect x="3" y="3" width="18" height="18" rx="2" />
                                                <circle cx="8.5" cy="8.5" r="1.5" />
                                                <path d="M11 11l2 2 4 -4" />
                                            </svg>
                                            Garden Image
                                        </label>
                                        <input type="file" name="garden_image" id="garden_image" accept="image/*"
                                            class="w-full px-4 py-3 border-2 border-green-200 rounded-xl focus:border-emerald-400 focus:ring-4 focus:ring-emerald-200 transition duration-300 bg-white/60 hover:bg-white/80 file:mr-4 file:rounded-full file:border-0 file:bg-green-100 file:px-4 file:py-2 file:text-green-800"
                                            onchange="previewGardenImage(event)">

                                        <!-- Preview Container -->
                                        <div class="mt-4">
                                            <img id="garden_image_preview"
                                                class="max-w-full rounded-xl shadow-md border-2 border-green-200 hidden"
                                                alt="Preview Image">
                                        </div>
                                    </div>


                                    <!-- Opening Time -->
                                    <div class="relative group">
                                        <label for="open_time"
                                            class="text-sm font-medium text-green-900 mb-2 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                class="mr-2 text-green-600">
                                                <circle cx="12" cy="12" r="9" />
                                                <path d="M12 7v5l3 3" />
                                            </svg>
                                            Opening Time
                                        </label>
                                        <input type="time" name="open_time" id="open_time"
                                            value="{{ old('open_time', $user->garden->open_time ?? '') }}"
                                            class="w-full px-4 py-3 border-2 border-green-200 rounded-xl focus:border-emerald-400 focus:ring-4 focus:ring-emerald-200 transition duration-300 bg-white/60 hover:bg-white/80 text-green-800 placeholder-green-400">
                                    </div>

                                    <!-- Closing Time -->
                                    <div class="relative group">
                                        <label for="close_time"
                                            class="text-sm font-medium text-green-900 mb-2 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                class="mr-2 text-green-600">
                                                <circle cx="12" cy="12" r="9" />
                                                <path d="M12 7v5l3 3" />
                                            </svg>
                                            Closing Time
                                        </label>
                                        <input type="time" name="close_time" id="close_time"
                                            value="{{ old('close_time', $user->garden->close_time ?? '') }}"
                                            class="w-full px-4 py-3 border-2 border-green-200 rounded-xl focus:border-emerald-400 focus:ring-4 focus:ring-emerald-200 transition duration-300 bg-white/60 hover:bg-white/80 text-green-800 placeholder-green-400">
                                    </div>
                                </div>
                            </div>

                            <div
                                class="bg-gradient-to-br from-green-50 to-emerald-100 rounded-2xl p-8 border border-green-100 shadow-lg mt-6">
                                <h2
                                    class="text-3xl font-bold text-green-900 mb-6 pb-3 border-b-2 border-green-200 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mr-4 text-green-600"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Garden Gallery
                                </h2>

                                <!-- Decorative Leaf Background -->
                                <div class="absolute top-4 right-4 opacity-20">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"
                                        class="text-green-600">
                                        <path d="M12 21a9 9 0 0 0 9-9 9 9 0 1 0 -9 9Z" />
                                        <path d="M3 3c0 9 3 12 9 12" />
                                    </svg>
                                </div>

                                <div class="space-y-6">
                                    <!-- Multiple Image Upload -->
                                    <div class="relative group">
                                        <label for="images"
                                            class="block text-sm font-medium text-green-900 mb-2 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                class="mr-2 text-green-600">
                                                <rect x="3" y="3" width="18" height="18" rx="2" />
                                                <circle cx="8.5" cy="8.5" r="1.5" />
                                                <path d="M11 11l2 2 4 -4" />
                                                <path d="M12 16l4 -4l4 4" />
                                            </svg>
                                            Upload Garden Gallery Images
                                        </label>
                                        <input type="file" name="images[]" id="images" multiple accept="image/*"
                                            class="w-full px-4 py-3 border-2 border-green-200 rounded-xl focus:border-emerald-400 focus:ring-4 focus:ring-emerald-200 transition duration-300 bg-white/60 hover:bg-white/80 file:mr-4 file:rounded-full file:border-0 file:bg-green-100 file:px-4 file:py-2 file:text-green-800">
                                        <p class="text-sm text-green-700 mt-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            You can upload multiple images (max 10 images)
                                        </p>
                                    </div>

                                    <!-- Preview Existing Images (Optional) -->
                                    <div id="existing-gallery-preview" class="grid grid-cols-3 md:grid-cols-5 gap-4">
                                        @if (isset($user->garden) && $user->garden->images)
                                            @foreach ($user->garden->images as $image)
                                                <div class="relative group">
                                                    <img src="{{ asset('storage/images/plants/' . $image->image_url) }}"
                                                        alt="Garden Gallery Image"
                                                        class="w-full h-32 object-cover rounded-xl">
                                                    <button type="button"
                                                        class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Submit Button with Leaf-Like Design -->
                        <div class="text-right">
                            <button type="submit"
                                class="bg-green-600 text-white px-8 py-3 rounded-full hover:bg-green-700 
                                transition duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl 
                                flex items-center justify-center group">
                                <span>Update Profile</span>
                                <svg class="w-6 h-6 ml-3 group-hover:rotate-45 transition duration-300" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* Additional subtle animations and background effects */
        body {
            background: linear-gradient(135deg, #f0fff4 0%, #e6f3e6 100%);
        }

        /* Soft leaf-like hover effects */
        input:hover,
        textarea:hover {
            border-color: theme('colors.green.300');
            transition: all 0.3s ease;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.getElementById('images').addEventListener('change', function(event) {
            const previewContainer = document.getElementById('existing-gallery-preview');
            const files = event.target.files;

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.className = 'relative group';
                    div.innerHTML = `
                <img src="${e.target.result}" alt="New Gallery Image" 
                     class="w-full h-32 object-cover rounded-xl">
                <button type="button" 
                        class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition-opacity"
                        onclick="this.closest('.group').remove()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            `;
                    previewContainer.appendChild(div);
                };

                reader.readAsDataURL(file);
            }
        });

        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('currentImage');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        function previewGardenImage(event) {
            const preview = document.getElementById('garden_image_preview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                preview.classList.add('hidden');
            }
        }
    </script>
@endpush
