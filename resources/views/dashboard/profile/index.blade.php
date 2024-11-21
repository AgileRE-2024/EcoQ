@extends('dashboard.layouts.template')

@section('content')
    <div class="bg-gradient-to-br from-green-100 to-emerald-200 min-h-screen p-6">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white bg-opacity-90 rounded-xl shadow-lg p-8 backdrop-blur-sm">
                <!-- Breadcrumb -->
                <nav class="mb-6" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2 text-sm">
                        <li class="flex items-center">
                            <a href="{{ route('dashboard') }}" class="text-green-600 hover:text-green-800 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 5l7 7-7 7" />
                            </svg>
                            <span class="ml-2 text-green-800">Profile</span>
                        </li>
                    </ol>
                </nav>

                <!-- User Profile Section -->
                <div class="mb-12">
                    <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-6 mb-8">
                        <!-- User Image -->
                        <div
                            class="w-40 h-40 md:w-56 md:h-56 rounded-full overflow-hidden border-4 border-green-300 shadow-lg relative group">
                            <img src="{{ $user->image ? asset('storage/images/users/' . $user->image) : asset('assets/images/default.png') }}"
                                alt="{{ $user->name }}"
                                class="w-full h-full object-cover transition duration-300 group-hover:scale-110">
                            <div
                                class="absolute inset-0 bg-green-600 bg-opacity-0 group-hover:bg-opacity-20 transition duration-300 flex items-center justify-center">
                                <svg class="w-12 h-12 text-white opacity-0 group-hover:opacity-100 transition duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                        </div>

                        <!-- User Info -->
                        <div class="text-center md:text-left">
                            <h1 class="text-4xl md:text-5xl font-bold text-green-800 mb-2">
                                {{ $user->name }}
                            </h1>
                            <div class="text-green-600 space-y-2">
                                <p class="flex items-center justify-center md:justify-start">
                                    <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0 4 4 0 008 0 4 4 0 00-8 0z" />
                                    </svg>
                                    {{ $user->email }}
                                </p>
                                <p class="flex items-center justify-center md:justify-start">
                                    <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    {{ $user->phone ?? 'No contact number' }}
                                </p>
                                <p class="flex items-center justify-center md:justify-start">
                                    <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{ $user->address ?? 'Address not specified' }}
                                </p>
                                <p class="flex items-center justify-center md:justify-start">
                                    <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $user->date_of_birth ? $user->date_of_birth : 'Birth date not specified' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Profile Button -->
                    <div class="flex justify-center md:justify-start">
                        <a href="{{ route('profile.edit', $user->id) }}"
                            class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg shadow-sm transition-all duration-150 hover:shadow-md">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit Profile
                        </a>
                    </div>
                </div>

                <!-- Garden Information Section -->
                @if (Auth::user()->role == 'garden_owner')
                    @if ($user->garden)
                        <div class="mb-12 bg-green-50 rounded-xl p-6 shadow-inner">
                            <h2 class="text-3xl font-semibold text-green-800 mb-6">Garden Information</h2>
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <img src="{{ $user->garden->image ? asset('storage/images/gardens/' . $user->garden->image) : asset('assets/images/garden.jpg') }}"
                                        alt="{{ $user->garden->name }}"
                                        class="w-full h-64 object-cover rounded-lg shadow-md">
                                </div>
                                <div class="space-y-4">
                                    <h3 class="text-2xl font-bold text-green-700">{{ $user->garden->name }}</h3>
                                    <p class="text-green-600 flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        {{ $user->garden->location }}
                                    </p>
                                    <p class="text-green-600 flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                        {{ $user->garden->phone_number }}
                                    </p>
                                    <p class="text-green-600 flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Open:
                                        {{ $user->garden->open_time ? $user->garden->open_time : 'Not specified' }}
                                        -
                                        Close:
                                        {{ $user->garden->close_time ? $user->garden->close_time : 'Not specified' }}
                                    </p>
                                    <p class="text-green-700">{{ $user->garden->description }}</p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="mb-12 bg-yellow-50 rounded-xl p-6 shadow-inner">
                            <h2 class="text-3xl font-semibold text-yellow-800 mb-4">No Garden Information</h2>
                            <p class="text-yellow-700">You haven't set up your garden information yet. Add your garden
                                details
                                to showcase it here!</p>
                        </div>
                    @endif
                    <!-- Garden Gallery -->
                    <div>
                        <h2 class="text-2xl font-semibold text-green-800 mb-4">Garden Gallery</h2>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            @forelse($user->garden->images ?? [] as $image)
                                <div class="overflow-hidden rounded-lg shadow-md transform transition hover:scale-105">
                                    <img src="{{ asset('storage/images/plants/' . $image->image_url) }}"
                                        alt="Garden Image" class="w-full h-48 object-cover">
                                </div>
                            @empty
                                <div class="col-span-full text-center text-green-600 bg-green-50 rounded-xl p-8">
                                    <svg class="w-16 h-16 mx-auto mb-4 text-green-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <p class="text-lg font-medium">No additional images available</p>
                                    <p class="mt-2">Add some beautiful photos to showcase your garden!</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endif


            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* Additional custom styles can be added here */
        .backdrop-blur-sm {
            backdrop-filter: blur(4px);
        }
    </style>
@endpush
