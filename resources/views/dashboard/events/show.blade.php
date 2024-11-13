@extends('dashboard.layouts.template')

@section('content')
    <div class="bg-gray-50 flex-1 p-6 min-h-screen">
        <div class="max-w-5xl mx-auto">

            <!-- Back Button -->
            <div class="mb-6">
                <a href="{{ route('events.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-sm transition-colors duration-150">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back
                </a>
            </div>

            <!-- Event Details Card -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $event->name }}</h1>

                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-6">
                        <!-- Date and Location -->
                        <div class="flex items-center text-gray-600 space-x-6">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-indigo-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3M3 11h18M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span>{{ $event->date ?? 'N/A' }} at {{ $event->time ?? 'N/A' }}</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-indigo-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13 21.313l-4.657-4.656a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>{{ $event->location ?? 'N/A' }}</span>
                            </div>
                        </div>

                        <!-- Organizer (Admin only) -->
                        @if (Auth::user()->role == 'admin')
                            <div class="mt-4 lg:mt-0">
                                <p class="text-gray-600"><strong>Organizer:</strong> {{ $event->garden->name ?? 'N/A' }}</p>
                            </div>
                        @endif
                    </div>

                    <!-- Event Description -->
                    <div class="border-t border-gray-200 pt-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-3">Event Description</h2>
                        <p class="text-gray-600">{{ $event->description ?? 'No description available' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
