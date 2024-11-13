@extends('dashboard.layouts.template')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-green-50 to-blue-50 p-6 md:mt-16">
        <div class="max-w-6xl mx-auto">
            <!-- Back Button -->
            <div class="mb-8">
                <a href="{{ route('plants.index') }}"
                    class="group inline-flex items-center gap-2 px-4 py-2 bg-white text-green-600 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 border border-green-100 hover:border-green-200">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 transform group-hover:-translate-x-1 transition-transform duration-300" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span class="font-medium">Back to Plants</span>
                </a>
            </div>

            <!-- Main Content Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <!-- Hero Section with Image -->
                @if ($plant->image)
                    <div class="relative h-[400px] bg-gray-900">
                        <img src="{{ asset('storage/images/plants/' . $plant->image) }}" alt="{{ $plant->name }}"
                            class="w-full h-full object-cover opacity-90">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <h1 class="absolute bottom-6 left-8 text-4xl font-bold text-white">{{ $plant->name }}</h1>
                    </div>
                @else
                    <div class="bg-gradient-to-r from-green-600 to-green-800 py-12 px-8">
                        <h1 class="text-4xl font-bold text-white">{{ $plant->name }}</h1>
                    </div>
                @endif

                <!-- Content Grid -->
                <div class="p-8">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <!-- Main Info -->
                        <div class="lg:col-span-2 space-y-8">
                            <!-- Basic Details -->
                            <div class="bg-green-50 rounded-xl p-6 space-y-4">
                                <h2 class="text-xl font-semibold text-green-800 mb-4">Basic Information</h2>
                                <div class="grid gap-4">
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
                            <div class="bg-blue-50 rounded-xl p-6">
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
                                <div class="bg-white rounded-xl p-6 border border-gray-200 text-center">
                                    <h3 class="text-lg font-medium text-gray-800 mb-4">Plant QR Code</h3>
                                    <img src="{{ asset('storage/' . $plant->qr_image) }}" alt="QR Code"
                                        class="mx-auto w-48 h-auto rounded-lg shadow-sm">
                                </div>
                            @endif

                            <!-- Parts Used -->
                            <div class="bg-purple-50 rounded-xl p-6">
                                <h3 class="text-xl font-semibold text-purple-800 mb-4">Parts Used</h3>
                                @if ($plant->partUsed->isNotEmpty())
                                    <div class="space-y-4">
                                        @foreach ($plant->partUsed as $part_used)
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
                    <div class="mt-8 bg-red-50 rounded-xl p-6">
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

                    {{-- Garden information --}}
                    @if (Auth::user()->role == 'admin')
                        <div class="mt-8 bg-yellow-50 rounded-xl p-6">
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
                                {{-- <div class="space-y-4">
                                    <div>
                                        <label class="text-sm text-yellow-600 font-medium">Garden Size</label>
                                        <p class="text-gray-800 mt-1">{{ $plant->garden->size ?? 'N/A' }}</p>
                                    </div>
                                    <div>
                                        <label class="text-sm text-yellow-600 font-medium">Garden Type</label>
                                        <p class="text-gray-800 mt-1">{{ $plant->garden->type ?? 'N/A' }}</p>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
