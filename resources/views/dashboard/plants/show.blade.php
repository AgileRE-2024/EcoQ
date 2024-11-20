@extends('dashboard.layouts.template')

@section('content')
    @push('styles')
        <style>
            @keyframes float {
                0% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-10px);
                }

                100% {
                    transform: translateY(0px);
                }
            }

            .float-animation {
                animation: float 6s ease-in-out infinite;
            }

            .leaf-pattern {
                background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M54.627,25.6c0,0-20.8-21.6-42.667,0C11.96,25.6-8.84,47.2,12.627,47.2s41.6-21.6,41.6-21.6' style='fill:none;stroke:%2322c55e;stroke-width:2;stroke-opacity:0.2'/%3E%3C/svg%3E");
            }
        </style>
    @endpush
    <div class="min-h-screen bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50 p-6">
        <div class="max-w-6xl mx-auto">
            <!-- Back Button -->
            <div class="mb-8">
                <a href="{{ route('plants.index') }}"
                    class="group inline-flex items-center gap-2 px-4 py-2 bg-white text-green-600 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 border border-green-100 hover:border-green-200">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 transform group-hover:-translate-x-1 transition-transform duration-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span class="font-medium">Back to Plants</span>
                </a>
            </div>

            <!-- Main Content Card -->
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl overflow-hidden border border-green-100">
                <!-- Hero Section with Image -->
                @if ($plant->image)
                    <div class="relative h-[500px]">
                        <img src="{{ asset('storage/images/plants/' . $plant->image) }}" alt="{{ $plant->name }}"
                            class="w-full h-full object-cover opacity-90">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/50 to-transparent"></div>
                        <h1 class="absolute bottom-6 left-8 text-4xl font-bold text-white">{{ $plant->name }}</h1>
                    </div>
                @else
                    <div class="h-full bg-gradient-to-r from-green-600 to-emerald-600">
                        <h1 class="text-4xl font-bold text-white">{{ $plant->name }}</h1>
                    </div>
                @endif

                <!-- Content Grid -->
                <div class="p-8 relative overflow-hidden">
                    <div class="absolute inset-0 leaf-pattern opacity-5"></div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 relative">
                        <!-- Main Info -->
                        <div class="lg:col-span-2 space-y-8">
                            <!-- Basic Details -->
                            <div
                                class="bg-gradient-to-br from-green-50 to-emerald-50/50 rounded-2xl p-8 space-y-6 shadow-md hover:shadow-lg transition-shadow duration-300">
                                <div class="flex items-center gap-3 mb-6">
                                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                    </svg>
                                    <h2 class="text-2xl font-bold text-green-800">Plant Details</h2>
                                </div>
                                <div class="grid gap-6">
                                    <div>
                                        <label class="text-sm text-green-600 font-medium">Common Name</label>
                                        <p class="text-gray-800 mt-1">{{ $plant->common_name ?? 'N/A' }}</p>
                                    </div>
                                    <div>
                                        <label class="text-sm text-green-600 font-medium">Scientific Name</label>
                                        <p class="italic text-gray-800 mt-1">{{ $plant->scientific_name ?? 'N/A' }}</p>
                                    </div>
                                    <div>
                                        <label class="text-sm text-green-600 font-medium">Description</label>
                                        <p class="text-gray-700 mt-1 leading-relaxed">{{ $plant->description ?? 'N/A' }}</p>
                                    </div>
                                    <div>
                                        <label class="text-sm text-green-600 font-medium">Habitat</label>
                                        <p class="text-gray-700 mt-1">{{ $plant->habitat ?? 'N/A' }}</p>
                                    </div>
                                    <div>
                                        <label class="text-sm text-green-600 font-medium">Chemical Compounds</label>
                                        <p class="text-gray-700 mt-1">{{ $plant->chemical_compounds ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Classification -->
                            <div
                                class="bg-gradient-to-br from-blue-50 to-cyan-50/50 rounded-2xl p-8 shadow-md hover:shadow-lg transition-shadow duration-300">
                                <h2 class="text-xl font-semibold text-blue-800 mb-4">Scientific Classification</h2>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="flex flex-col space-y-4">
                                        <div>
                                            <label class="text-sm text-blue-600 font-medium">Kingdom</label>
                                            <p class="text-gray-800 mt-1">{{ $plant->classification->kingdom ?? 'N/A' }}
                                            </p>
                                        </div>
                                        <div>
                                            <label class="text-sm text-blue-600 font-medium">Division</label>
                                            <p class="text-gray-800 mt-1">{{ $plant->classification->division ?? 'N/A' }}
                                            </p>
                                        </div>
                                        <div>
                                            <label class="text-sm text-blue-600 font-medium">Class</label>
                                            <p class="text-gray-800 mt-1">{{ $plant->classification->class ?? 'N/A' }}</p>
                                        </div>
                                        <div>
                                            <label class="text-sm text-blue-600 font-medium">Order</label>
                                            <p class="text-gray-800 mt-1">{{ $plant->classification->order ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-col space-y-4">
                                        <div>
                                            <label class="text-sm text-blue-600 font-medium">Family</label>
                                            <p class="text-gray-800 mt-1">{{ $plant->classification->family ?? 'N/A' }}</p>
                                        </div>
                                        <div>
                                            <label class="text-sm text-blue-600 font-medium">Genus</label>
                                            <p class="text-gray-800 mt-1">{{ $plant->classification->genus ?? 'N/A' }}</p>
                                        </div>
                                        <div>
                                            <label class="text-sm text-blue-600 font-medium">Species</label>
                                            <p class="text-gray-800 mt-1">{{ $plant->classification->species ?? 'N/A' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sidebar -->
                        <div class="space-y-8">
                            <!-- QR Code -->
                            @if ($plant->qr_image)
                                <div
                                    class="bg-white/90 backdrop-blur-sm rounded-2xl p-6 border border-green-100 text-center shadow-md hover:shadow-lg transition-all duration-300">
                                    <h3 class="text-lg font-medium text-gray-800 mb-4">Plant QR Code</h3>
                                    <img src="{{ asset('storage/' . $plant->qr_image) }}" alt="QR Code"
                                        class="mx-auto w-48 h-auto rounded-lg shadow-sm">
                                </div>
                            @endif

                            <!-- Parts Used -->
                            <div
                                class="bg-gradient-to-br from-purple-50 to-pink-50/50 rounded-2xl p-6 shadow-md hover:shadow-lg transition-all duration-300">
                                <h3 class="text-xl font-semibold text-purple-800 mb-4">Parts Used</h3>
                                @if ($plant->partUseds->isNotEmpty())
                                    <div class="space-y-4">
                                        @foreach ($plant->partUseds as $part_used)
                                            <div class="bg-white rounded-lg p-4 shadow-sm">
                                                <h4 class="font-medium text-purple-700">{{ $part_used->part }}</h4>
                                                <p class="text-gray-600 mt-2 text-sm">{{ $part_used->usage }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-gray-600">No parts used data available.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Pharmacological Aspects -->
                    <div
                        class="mt-8 bg-gradient-to-br from-red-50 to-orange-50/50 rounded-2xl p-8 shadow-md hover:shadow-lg transition-all duration-300">
                        <h2 class="text-xl font-semibold text-red-800 mb-4">Pharmacological Aspects</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div>
                                    <label class="text-sm text-red-600 font-medium">Toxicity</label>
                                    <p class="text-gray-800 mt-1">{{ $plant->pharmacologyAspect->toxicity ?? 'N/A' }}</p>
                                </div>
                                <div>
                                    <label class="text-sm text-red-600 font-medium">Contraindications</label>
                                    <p class="text-gray-800 mt-1">
                                        {{ $plant->pharmacologyAspect->contraindications ?? 'N/A' }}</p>
                                </div>
                                <div>
                                    <label class="text-sm text-red-600 font-medium">Warnings</label>
                                    <p class="text-gray-800 mt-1">{{ $plant->pharmacologyAspect->warnings ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label class="text-sm text-red-600 font-medium">Precautions</label>
                                    <p class="text-gray-800 mt-1">{{ $plant->pharmacologyAspect->precautions ?? 'N/A' }}
                                    </p>
                                </div>
                                <div>
                                    <label class="text-sm text-red-600 font-medium">Side Effects</label>
                                    <p class="text-gray-800 mt-1">{{ $plant->pharmacologyAspect->side_effects ?? 'N/A' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Plant Images Section -->
                    <div
                        class="mt-8 bg-gradient-to-br from-yellow-50 to-amber-50/50 rounded-2xl p-8 shadow-md hover:shadow-lg transition-all duration-300">
                        <h2 class="text-xl font-semibold text-yellow-800 mb-4">Plant Images</h2>
                        @if ($plant->images->isNotEmpty())
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                                @foreach ($plant->images as $image)
                                    <div
                                        class="relative overflow-hidden rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                                        <img src="{{ asset('storage/images/plants/' . $image->image_url) }}"
                                            alt="Plant image" class="w-full h-48 object-cover">
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-600">No additional images available.</p>
                        @endif
                    </div>

                    <!-- Garden Information (Admin Only) -->
                    @if (Auth::user()->role == 'admin')
                        <div class="mt-8 bg-yellow-50 rounded-xl p-6 shadow-md">
                            <h2 class="text-xl font-semibold text-yellow-800 mb-4">Garden Information</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-4">
                                    <div>
                                        <label class="text-sm text-yellow-600 font-medium">Garden Name</label>
                                        <p class="text-gray-800 mt-1">{{ $plant->garden->name ?? 'N/A' }}</p>
                                    </div>
                                    <div>
                                        <label class="text-sm text-yellow-600 font-medium">Garden Location</label>
                                        <p class="text-gray-800 mt-1">{{ $plant->garden->location ?? 'N/A' }}</p>
                                    </div>
                                    <div>
                                        <label class="text-sm text-yellow-600 font-medium">Garden Owner</label>
                                        <p class="text-gray-800 mt-1">{{ $plant->garden->user->name ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
