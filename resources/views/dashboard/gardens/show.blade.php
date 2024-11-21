@extends('dashboard.layouts.template')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50 py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Breadcrumb Navigation -->
            <nav class="bg-white/80 backdrop-blur-sm rounded-xl shadow-sm p-4 mb-8 flex items-center justify-between">
                <ol class="flex items-center space-x-2 text-sm">
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="text-green-600 hover:text-green-800 transition-colors duration-200 flex items-center">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <li>
                        <a href="{{ route('gardens.index') }}"
                            class="text-green-600 hover:text-green-800 transition-colors duration-200">
                            Gardens
                        </a>
                    </li>
                    <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <li class="text-green-800 font-medium">{{ $garden->name }}</li>
                </ol>

                <a href="{{ route('gardens.index') }}"
                    class="group inline-flex items-center px-4 py-2 text-sm font-medium text-green-700 hover:text-green-900 bg-green-50 hover:bg-green-100 rounded-lg transition-all duration-200">
                    <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform duration-200"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back to Gardens
                </a>
            </nav>

            <!-- Hero Section -->
            <div class="relative rounded-3xl overflow-hidden mb-8 bg-white shadow-xl">
                @if ($garden->image)
                    <div class="relative h-[60vh] max-h-[600px]">
                        <img src="{{ asset('storage/images/gardens/' . $garden->image) }}" alt="{{ $garden->name }}"
                            class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

                        <!-- Hero Content -->
                        <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                            <h1 class="text-5xl font-bold mb-4 leading-tight">{{ $garden->name }}</h1>

                            <!-- Quick Stats -->
                            <div class="mt-8 grid grid-cols-2 sm:grid-cols-4 gap-6">
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                                    <p class="text-green-300 text-sm">Location</p>
                                    <p class="font-semibold">{{ $garden->location ?? 'N/A' }}</p>
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                                    <p class="text-green-300 text-sm">Total Plants</p>
                                    <p class="font-semibold">{{ $garden->plants->count() }}</p>
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                                    <p class="text-green-300 text-sm">Upcoming Events</p>
                                    <p class="font-semibold">{{ $garden->events->count() }}</p>
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                                    <p class="text-green-300 text-sm">Contact</p>
                                    <p class="font-semibold">{{ $garden->phone_number ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Main Content Grid -->
                <div class="p-8">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <!-- Main Info Column -->
                        <div class="lg:col-span-2 space-y-8">
                            <!-- Garden Details -->
                            <div
                                class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                                <div class="flex items-center gap-4 mb-6">
                                    <div class="p-3 bg-green-100 rounded-full">
                                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h2 class="text-2xl font-bold text-green-800">Garden Information</h2>
                                        <p class="text-green-600">Detailed garden characteristics</p>
                                    </div>
                                </div>

                                <div class="grid gap-6">
                                    <div
                                        class="bg-white/60 rounded-xl p-6 hover:bg-white/80 transition-colors duration-200">
                                        <label class="text-sm font-medium text-green-600">Description</label>
                                        <p class="text-gray-800 text-lg mt-1">{{ $garden->description ?? 'N/A' }}</p>
                                    </div>
                                    <div
                                        class="bg-white/60 rounded-xl p-6 hover:bg-white/80 transition-colors duration-200">
                                        <label class="text-sm font-medium text-green-600">Operating Hours</label>
                                        <p class="text-gray-800 text-lg mt-1">
                                            {{ $garden->open_time ? $garden->open_time . ' - ' . $garden->close_time : 'N/A' }}
                                        </p>
                                    </div>
                                    <div
                                        class="bg-white/60 rounded-xl p-6 hover:bg-white/80 transition-colors duration-200">
                                        <label class="text-sm font-medium text-green-600">Contact Information</label>
                                        <p class="text-gray-700 mt-2 leading-relaxed">
                                            Phone: {{ $garden->phone_number ?? 'N/A' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sidebar -->
                        <div class="space-y-8">
                            <!-- Garden Owner Information -->
                            <div
                                class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                                <div class="flex items-center gap-3 mb-6">
                                    <div class="p-2 bg-purple-100 rounded-full">
                                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-xl font-bold text-purple-800">Garden Owner</h3>
                                </div>

                                <div class="text-center">
                                    <img src="{{ $garden->user->image ? asset('storage/images/users/' . $garden->user->image) : asset('assets/images/default-avatar.png') }}"
                                        alt="{{ $garden->user->name }}"
                                        class="w-32 h-32 rounded-full object-cover mx-auto mb-4">
                                    <h4 class="font-medium text-purple-700">{{ $garden->user->name }}</h4>
                                    <p class="text-gray-600 text-sm">{{ $garden->user->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Plants in Garden -->
                    <div
                        class="mt-8 bg-gradient-to-br from-green-50 to-emerald-100 rounded-3xl p-6 md:p-8 shadow-2xl hover:shadow-3xl transition-all duration-500 ease-in-out">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-4">
                                <div class="p-3.5 bg-green-100 rounded-xl shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-green-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-3xl font-extrabold text-green-900 tracking-tight">Garden Plants</h2>
                                    <p class="text-green-700 text-opacity-80">A flourishing collection of your green
                                        companions</p>
                                </div>
                            </div>
                            @if ($garden->plants->count() > 0)
                                <div class="text-sm text-green-700 bg-green-100 px-3 py-1 rounded-full">
                                    {{ $garden->plants->count() }} Plants
                                </div>
                            @endif
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
                            @forelse ($garden->plants as $plant)
                                <div
                                    class="group perspective-1000 transform transition-all duration-500 hover:-translate-y-2">
                                    <div
                                        class="relative overflow-hidden rounded-2xl shadow-lg bg-white transform-style-3d backface-hidden">
                                        <img src="{{ $plant->image ? asset('storage/images/plants/' . $plant->image) : asset('assets/images/plant.jpeg') }}"
                                            alt="{{ $plant->name }}"
                                            class="w-full h-56 object-cover rounded-t-2xl transition-transform duration-500 group-hover:scale-105">

                                        <div class="p-4 space-y-2">
                                            <h3 class="text-xl font-bold text-green-900 truncate">{{ $plant->name }}</h3>
                                            <div class="flex items-center text-sm text-green-700">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                                                </svg>
                                                {{ $plant->species->name ?? 'Unknown Species' }}
                                            </div>
                                        </div>

                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                                            <div class="p-4 w-full">
                                                <a href="{{ route('plants.show', $plant->id) }}"
                                                    class="w-full text-center block bg-white/20 backdrop-blur-sm text-white py-2 rounded-lg 
                                      hover:bg-white/30 transition-all duration-300 transform hover:scale-105">
                                                    Explore Plant
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-full text-center py-12 bg-green-50 rounded-2xl">
                                    <svg class="mx-auto w-16 h-16 text-green-300 mb-4" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9.172 16.172a4 4 0 005.656 0m-5.656 0l-3-3m3 3l3-3m3 3l-3-3m3 3V7m-9 9h12a2 2 0 002-2V5a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <p class="text-green-600 text-xl font-semibold">No plants in this garden yet</p>
                                    <p class="text-green-500 mt-2">Start planting and watch your garden grow!</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Events Section -->
                    <div
                        class="mt-8 bg-gradient-to-br from-yellow-50 to-amber-50 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="p-3 bg-yellow-100 rounded-full">
                                <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2h14z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-yellow-800">Upcoming Events</h2>
                                <p class="text-yellow-600">Exciting activities in this garden</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @forelse ($garden->events as $event)
                                <div
                                    class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                                    <div class="relative">
                                        <img src="{{ $event->image ? asset('storage/images/events/' . $event->image) : asset('assets/images/event-placeholder.jpg') }}"
                                            alt="{{ $event->title }}"
                                            class="w-full h-48 object-cover transform hover:scale-110 transition-transform duration-300">
                                        <div
                                            class="absolute top-4 right-4 bg-yellow-500/80 text-white px-3 py-1 rounded-full text-sm">
                                            {{ \Carbon\Carbon::parse($event->date)->format('M d') }}
                                        </div>
                                    </div>
                                    <div class="p-6">
                                        <h3 class="text-xl font-bold text-yellow-800 mb-2">{{ $event->title }}</h3>
                                        <div class="flex items-center text-gray-600 mb-3">
                                            <svg class="w-5 h-5 mr-2 text-yellow-500" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <span>{{ $event->location }}</span>
                                        </div>
                                        <div class="flex items-center text-gray-600 mb-4">
                                            <svg class="w-5 h-5 mr-2 text-yellow-500" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>{{ \Carbon\Carbon::parse($event->time)->format('h:i A') }}</span>
                                        </div>
                                        <p class="text-gray-700 mb-4 line-clamp-3">{{ $event->description }}</p>
                                        <div class="flex justify-between items-center">
                                            <a href="{{ route('events.show', $event->id) }}"
                                                class="inline-block bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition-colors">
                                                View Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="col-span-full text-center text-gray-500 py-4">No upcoming events in this garden.
                                </p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
