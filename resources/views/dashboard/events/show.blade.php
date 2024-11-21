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
                        <a href="{{ route('events.index') }}"
                            class="text-green-600 hover:text-green-800 transition-colors duration-200">
                            Events
                        </a>
                    </li>
                    <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <li class="text-green-800 font-medium">{{ $event->title }}</li>
                </ol>

                <div class="flex space-x-2">
                    <a href="{{ route('events.edit', $event->id) }}"
                        class="group inline-flex items-center px-4 py-2 text-sm font-medium text-yellow-700 hover:text-yellow-900 bg-yellow-50 hover:bg-yellow-100 rounded-lg transition-all duration-200 hover:shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 mr-2 group-hover:rotate-6 transition-transform" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit Event
                    </a>
                    <a href="{{ route('events.index') }}"
                        class="group inline-flex items-center px-4 py-2 text-sm font-medium text-green-700 hover:text-green-900 bg-green-50 hover:bg-green-100 rounded-lg transition-all duration-200 hover:shadow-md">
                        <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Back to Events
                    </a>
                </div>
            </nav>

            <!-- Event Details Card -->
            <div class="relative group">
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 
                    group-hover:shadow-xl 
                    border border-transparent 
                    group-hover:border-green-100 
                    group-hover:translate-y-[-5px]">

                    <div class="grid md:grid-cols-2 gap-6 p-6">
                        <!-- Event Image Section -->
                        <div class="relative">
                            @if ($event->image)
                                <div class="overflow-hidden rounded-lg shadow-md">
                                    <img src="{{ asset('storage/images/events/' . $event->image) }}"
                                        alt="{{ $event->title }}"
                                        class="w-full h-96 object-cover transition-transform duration-300 group-hover:scale-105">
                                </div>
                            @else
                                <div class="w-full h-96 bg-green-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-24 h-24 text-green-300" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            @endif

                            <!-- Additional Event Images -->
                            @if ($event->images->count() > 0)
                                <div class="mt-4 flex space-x-2 overflow-x-auto pb-2">
                                    @foreach ($event->images as $eventImage)
                                        <div class="relative group/image">
                                            <img src="{{ asset('storage/images/events/' . $eventImage->image_url) }}"
                                                alt="Event Image"
                                                class="w-24 h-24 object-cover rounded-lg shadow-sm 
                                                    transition-all duration-300 
                                                    group-hover/image:scale-110 
                                                    group-hover/image:shadow-lg">
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <!-- Event Details Section -->
                        <div class="space-y-6">
                            <div>
                                <h1
                                    class="text-3xl font-bold text-green-800 mb-3 group-hover:text-green-900 transition-colors">
                                    {{ $event->title }}
                                </h1>
                                <p class="text-green-600 text-lg group-hover:text-green-700 transition-colors">
                                    {{ $event->description }}
                                </p>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div
                                    class="bg-green-50 p-4 rounded-lg transition-all duration-300 group-hover:bg-green-100">
                                    <div class="flex items-center mb-2">
                                        <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <h3 class="text-green-800 font-semibold">Date</h3>
                                    </div>
                                    <p class="text-green-700">{{ \Carbon\Carbon::parse($event->date)->format('F d, Y') }}
                                    </p>
                                </div>

                                <div
                                    class="bg-green-50 p-4 rounded-lg transition-all duration-300 group-hover:bg-green-100">
                                    <div class="flex items-center mb-2">
                                        <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <h3 class="text-green-800 font-semibold">Time</h3>
                                    </div>
                                    <p class="text-green-700">{{ \Carbon\Carbon::parse($event->time)->format('h:i A') }}
                                    </p>
                                </div>
                            </div>

                            <div class="bg-green-50 p-4 rounded-lg transition-all duration-300 group-hover:bg-green-100">
                                <div class="flex items-center mb-2">
                                    <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <h3 class="text-green-800 font-semibold">Location</h3>
                                </div>
                                <p class="text-green-700">{{ $event->location }}</p>
                            </div>
                        </div>
                        @if (auth()->check() && auth()->user()->role === 'admin')
                            <div class="mt-6 bg-green-50 p-6 rounded-lg transition-all duration-300 hover:bg-green-100">
                                <h2 class="text-2xl font-bold text-green-800 mb-4">Garden Details</h2>
                                <div class="grid md:grid-cols-2 gap-4">
                                    <div>
                                        <div class="flex items-center mb-2">
                                            <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                            </svg>
                                            <h3 class="text-green-800 font-semibold">Garden Name</h3>
                                        </div>
                                        <p class="text-green-700">{{ $event->garden->name ?? 'Not Available' }}</p>
                                    </div>

                                    <div>
                                        <div class="flex items-center mb-2">
                                            <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <h3 class="text-green-800 font-semibold">Garden Location</h3>
                                        </div>
                                        <p class="text-green-700">{{ $event->garden->location ?? 'Not Available' }}</p>
                                    </div>

                                    <div class="md:col-span-2">
                                        <div class="flex items-center mb-2">
                                            <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <h3 class="text-green-800 font-semibold">Garden Description</h3>
                                        </div>
                                        <p class="text-green-700">
                                            {{ $event->garden->description ?? 'No description available' }}</p>
                                    </div>

                                    <div>
                                        <div class="flex items-center mb-2">
                                            <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                            <h3 class="text-green-800 font-semibold">Contact Number</h3>
                                        </div>
                                        <p class="text-green-700">{{ $event->garden->phone_number ?? 'Not Available' }}
                                        </p>
                                    </div>

                                    <div>
                                        <div class="flex items-center mb-2">
                                            <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <h3 class="text-green-800 font-semibold">Garden Hours</h3>
                                        </div>
                                        <p class="text-green-700">
                                            {{ $event->garden->open_time ? \Carbon\Carbon::parse($event->garden->open_time)->format('h:i A') : 'Not Available' }}
                                            -
                                            {{ $event->garden->close_time ? \Carbon\Carbon::parse($event->garden->close_time)->format('h:i A') : 'Not Available' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
