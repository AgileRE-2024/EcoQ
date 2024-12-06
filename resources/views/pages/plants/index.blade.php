@extends('layouts.app')
@section('content')
    @push('styles')
        <style>
            /* Animation keyframes remain the same */
            @keyframes float {
                0% {
                    transform: translateY(0px) rotate(0deg);
                }

                50% {
                    transform: translateY(-10px) rotate(5deg);
                }

                100% {
                    transform: translateY(0px) rotate(0deg);
                }

            }

            @keyframes blob {
                0% {
                    transform: scale(1);
                }

                50% {
                    transform: scale(1.1);
                }

                100% {
                    transform: scale(1);
                }
            }

            .animate-blob {
                animation: blob 7s infinite;
            }

            .animation-delay-2000 {
                animation-delay: 2s;
            }

            .animation-delay-4000 {
                animation-delay: 4s;
            }
        </style>
    @endpush
    <div class="bg-white min-h-screen">
        {{-- Hero Section with Advanced Search --}}
        <section class="relative pt-28 pb-16 bg-gradient-to-b from-green-50 to-white overflow-hidden">
            {{-- Decorative Elements with adjusted positioning --}}
            <div class="absolute inset-0 pointer-events-none">
                <div
                    class="absolute top-20 left-0 w-64 h-64 bg-green-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob">
                </div>
                <div
                    class="absolute top-20 right-0 w-64 h-64 bg-emerald-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
                </div>
                <div
                    class="absolute -bottom-8 left-20 w-64 h-64 bg-teal-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000">
                </div>
            </div>

            <div class="container mx-auto px-4 relative">
                {{-- Hero Content with improved spacing --}}
                <div class="max-w-3xl mx-auto text-center mb-12">
                    <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                        Discover Your Perfect Plant
                    </h1>
                    <p class="text-xl md:text-2xl text-gray-600 mb-8 max-w-2xl mx-auto">
                        Find the perfect plant to bring life to your space
                    </p>

                    <div class="max-w-2xl mx-auto">
                        <div class="relative mb-6 group">

                            <form action="{{ route('search') }}" method="GET" class="relative">
                                <div class="flex items-center">
                                    <!-- Search Icon -->
                                    <div class="absolute left-4">
                                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1116.5 9.5a7.5 7.5 0 010 10.5z" />
                                        </svg>
                                    </div>
                                    <!-- Search Input -->
                                    <input type="text" name="query"
                                        placeholder="Search plants by name, category, or care level..."
                                        class="w-full pl-12 pr-4 py-4 rounded-l-full border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 focus:ring-opacity-50 transition-all duration-300 text-lg shadow-sm group-hover:border-green-300">

                                    <!-- Submit Button -->
                                    <button type="submit"
                                        class="px-6 py-4 bg-green-600 text-white rounded-r-full hover:bg-green-700 transform hover:scale-105 transition-all duration-300 shadow-sm">
                                        Search
                                    </button>
                                </div>
                            </form>

                        </div>

                        <div class="flex flex-wrap justify-center gap-3 mb-8">
                            <button
                                class="px-6 py-2 rounded-full bg-green-600 text-white 
                               hover:bg-green-700 transform hover:scale-105
                               transition-all duration-300 shadow-sm">
                                All Plants
                            </button>
                            <button
                                class="px-6 py-2 rounded-full bg-white text-gray-700 
                               hover:bg-green-100 hover:text-green-700 
                               transform hover:scale-105
                               transition-all duration-300 
                               border border-gray-200 shadow-sm">
                                Indoor
                            </button>
                            <button
                                class="px-6 py-2 rounded-full bg-white text-gray-700 
                               hover:bg-green-100 hover:text-green-700 
                               transform hover:scale-105
                               transition-all duration-300 
                               border border-gray-200 shadow-sm">
                                Outdoor
                            </button>
                            <button
                                class="px-6 py-2 rounded-full bg-white text-gray-700 
                               hover:bg-green-100 hover:text-green-700 
                               transform hover:scale-105
                               transition-all duration-300 
                               border border-gray-200 shadow-sm">
                                Succulents
                            </button>
                        </div>
                    </div>
                </div>
                <div class="mb-16">
                    <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center">Featured Plants</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($featuredPlants as $plant)
                            <div
                                class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 flex flex-col">
                                {{-- Plant Image Gallery --}}
                                <div class="relative group">
                                    <div class="h-64 overflow-hidden bg-gray-100"> <!-- Fixed height container -->
                                        <img src="{{ $plant->image ? asset('storage/images/plants/' . $plant->image) : asset('assets/images/plant.jpeg') }}"
                                            alt="{{ $plant->name }}"
                                            class="w-full h-full object-cover object-center transform group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                </div>

                                {{-- Detailed Plant Information --}}
                                <div class="p-6 flex flex-col flex-grow">
                                    {{-- Title and Classification --}}
                                    <div class="flex justify-between items-start mb-4">
                                        <div>
                                            <h2 class="text-xl font-bold text-green-800 mb-2">{{ $plant->name }}</h2>
                                            <p class="text-sm text-gray-500 italic">{{ $plant->scientific_name }}</p>
                                        </div>
                                        <span
                                            class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-medium">
                                            {{ $plant->genus->name ?? 'Unclassified' }}
                                        </span>
                                    </div>

                                    {{-- Taxonomic Information --}}
                                    <div
                                        class="grid grid-cols-3 gap-2 text-center border-t border-b py-3 border-gray-100 mb-4">
                                        <div>
                                            <span class="block text-xs text-gray-500">Kingdom</span>
                                            <span class="font-semibold text-sm">{{ $plant->kingdom->name ?? '-' }}</span>
                                        </div>
                                        <div>
                                            <span class="block text-xs text-gray-500">Family</span>
                                            <span class="font-semibold text-sm">{{ $plant->family->name ?? '-' }}</span>
                                        </div>
                                        <div>
                                            <span class="block text-xs text-gray-500">Species</span>
                                            <span class="font-semibold text-sm">{{ $plant->species->name ?? '-' }}</span>
                                        </div>
                                    </div>

                                    {{-- Description --}}
                                    <p class="text-gray-600 mb-4 line-clamp-3 min-h-[60px]">
                                        {{ Str::limit($plant->description, 150, '...') }}
                                    </p>

                                    {{-- Quick Actions --}}
                                    <div class="mt-auto flex justify-between items-center">
                                        <a href="{{ route('plant', $plant) }}"
                                            class="flex items-center text-green-600 hover:text-green-800 transition">
                                            View Details
                                            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                                            </svg>
                                        </a>
                                        @if ($plant->qr_image)
                                            <a href="{{ $plant->qr_image }}" target="_blank"
                                                class="text-gray-500 hover:text-green-600">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                                                </svg>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </section>

        <section class="relative pt-28 pb-16 bg-gradient-to-b from-green-50 to-white overflow-hidden">
            <div class="container mx-auto px-4 py-16">
                <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center">All Plants</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($plants as $plant)
                        <div
                            class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 flex flex-col">
                            {{-- Plant Image Gallery --}}
                            <div class="relative group">
                                <div class="h-64 overflow-hidden bg-gray-100"> <!-- Fixed height container -->
                                    <img src="{{ $plant->image ? asset('storage/images/plants/' . $plant->image) : asset('assets/images/plant.jpeg') }}"
                                        alt="{{ $plant->name }}"
                                        class="w-full h-full object-cover object-center transform group-hover:scale-105 transition-transform duration-500">
                                </div>
                            </div>

                            {{-- Detailed Plant Information --}}
                            <div class="p-6 flex flex-col flex-grow">
                                {{-- Title and Classification --}}
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h2 class="text-xl font-bold text-green-800 mb-2">{{ $plant->name }}</h2>
                                        <p class="text-sm text-gray-500 italic">{{ $plant->scientific_name }}</p>
                                    </div>
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-medium">
                                        {{ $plant->genus->name ?? 'Unclassified' }}
                                    </span>
                                </div>

                                {{-- Taxonomic Information --}}
                                <div class="grid grid-cols-3 gap-2 text-center border-t border-b py-3 border-gray-100 mb-4">
                                    <div>
                                        <span class="block text-xs text-gray-500">Kingdom</span>
                                        <span class="font-semibold text-sm">{{ $plant->kingdom->name ?? '-' }}</span>
                                    </div>
                                    <div>
                                        <span class="block text-xs text-gray-500">Family</span>
                                        <span class="font-semibold text-sm">{{ $plant->family->name ?? '-' }}</span>
                                    </div>
                                    <div>
                                        <span class="block text-xs text-gray-500">Species</span>
                                        <span class="font-semibold text-sm">{{ $plant->species->name ?? '-' }}</span>
                                    </div>
                                </div>

                                {{-- Description --}}
                                <p class="text-gray-600 mb-4 line-clamp-3 min-h-[60px]">
                                    {{ Str::limit($plant->description, 150, '...') }}
                                </p>

                                {{-- Quick Actions --}}
                                <div class="mt-auto flex justify-between items-center">
                                    <a href="{{ route('plant', $plant) }}"
                                        class="flex items-center text-green-600 hover:text-green-800 transition">
                                        View Details
                                        <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                    @if ($plant->qr_image)
                                        <a href="{{ $plant->qr_image }}" target="_blank"
                                            class="text-gray-500 hover:text-green-600">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-12 flex justify-center">
                    {{ $plants->links() }}
                </div>
            </div>
        </section>


        <section class="py-16 bg-gradient-to-b from-white to-green-50 relative overflow-hidden">
            <!-- Decorative Background Elements -->
            <div class="absolute inset-0 pointer-events-none">
                <div
                    class="absolute top-0 left-0 w-64 h-64 bg-green-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob">
                </div>
                <div
                    class="absolute bottom-0 right-0 w-64 h-64 bg-emerald-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
                </div>
            </div>

            <div class="container mx-auto px-4 relative">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-green-800 mb-4">Garden Tips & Wisdom</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">Expert advice to help your garden thrive throughout the year
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Watering Tips -->
                    <div
                        class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-green-100 group">
                        <div class="flex items-start mb-4">
                            <div class="bg-green-100 rounded-full p-3 group-hover:bg-green-200 transition-colors">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path>
                                    <path d="M18 2l4 4-10 10-4-4"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-xl font-bold text-green-800 mb-2">Smart Watering</h3>
                                <div class="flex items-center mb-3">
                                    <span
                                        class="text-xs font-medium text-green-600 bg-green-100 px-2 py-1 rounded-full">Beginner
                                        Friendly</span>
                                </div>
                                <ul class="space-y-2 text-gray-600">
                                    <li class="flex items-start">
                                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2 mt-2"></span>
                                        Water deeply but less frequently
                                    </li>
                                    <li class="flex items-start">
                                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2 mt-2"></span>
                                        Water early morning or late evening
                                    </li>
                                    <li class="flex items-start">
                                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2 mt-2"></span>
                                        Check soil moisture before watering
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Soil Care -->
                    <div
                        class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-green-100 group">
                        <div class="flex items-start mb-4">
                            <div class="bg-green-100 rounded-full p-3 group-hover:bg-green-200 transition-colors">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-xl font-bold text-green-800 mb-2">Soil Health</h3>
                                <div class="flex items-center mb-3">
                                    <span
                                        class="text-xs font-medium text-yellow-600 bg-yellow-100 px-2 py-1 rounded-full">Intermediate</span>
                                </div>
                                <ul class="space-y-2 text-gray-600">
                                    <li class="flex items-start">
                                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2 mt-2"></span>
                                        Test soil pH regularly
                                    </li>
                                    <li class="flex items-start">
                                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2 mt-2"></span>
                                        Add organic matter annually
                                    </li>
                                    <li class="flex items-start">
                                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2 mt-2"></span>
                                        Maintain proper drainage
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Pest Control -->
                    <div
                        class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-green-100 group">
                        <div class="flex items-start mb-4">
                            <div class="bg-green-100 rounded-full p-3 group-hover:bg-green-200 transition-colors">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-xl font-bold text-green-800 mb-2">Natural Pest Control</h3>
                                <div class="flex items-center mb-3">
                                    <span
                                        class="text-xs font-medium text-red-600 bg-red-100 px-2 py-1 rounded-full">Advanced</span>
                                </div>
                                <ul class="space-y-2 text-gray-600">
                                    <li class="flex items-start">
                                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2 mt-2"></span>
                                        Companion planting
                                    </li>
                                    <li class="flex items-start">
                                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2 mt-2"></span>
                                        Beneficial insects
                                    </li>
                                    <li class="flex items-start">
                                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2 mt-2"></span>
                                        Organic pest solutions
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Natural Footer Decoration --}}

        <section class="py-16 bg-gradient-to-b from-green-50 to-white">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-12 text-green-800">Plant Care Guide</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach (['Light', 'Water', 'Temperature', 'Humidity'] as $category)
                        <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition-shadow duration-300">
                            <div class="flex flex-col items-center text-center">
                                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <!-- Add appropriate icon paths -->
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-green-800 mb-2">{{ $category }}</h3>
                                <p class="text-gray-600">Essential {{ strtolower($category) }} requirements for healthy
                                    plants.</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </section>

    </div>
@endsection

@push('styles')
    <style>
        @keyframes wave {
            0% {
                transform: translateX(0) translateY(0);
            }

            50% {
                transform: translateX(-25%) translateY(2px);
            }

            100% {
                transform: translateX(-50%) translateY(0);
            }
        }

        .wave-animation {
            animation: wave 15s linear infinite;
        }

        .garden-card {
            backdrop-filter: blur(8px);
            background: linear-gradient(to bottom right, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.8));
        }

        /* Custom animations and transitions */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .plant-card {
            animation: fadeIn 0.5s ease-out;
        }
    </style>
@endpush
