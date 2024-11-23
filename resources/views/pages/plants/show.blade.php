@extends('layouts.app')
@section('content')
    @push('styles')
        <style>
            @keyframes blob {
                0% {
                    transform: translate(0px, 0px) scale(1);
                }

                33% {
                    transform: translate(30px, -50px) scale(1.1);
                }

                66% {
                    transform: translate(-20px, 20px) scale(0.9);
                }

                100% {
                    transform: translate(0px, 0px) scale(1);
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
    <div class="min-h-screen bg-gradient-to-b from-green-100 to-white pt-16">

        <!-- Hero Section with Nature-Inspired Design -->
        <div class="relative overflow-hidden bg-gradient-to-b from-green-50/50 via-white to-white">
            <div class="absolute inset-0 pointer-events-none">
                <div
                    class="absolute top-0 left-0 w-72 h-72 bg-green-100/60 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob">
                </div>
                <div
                    class="absolute top-0 right-0 w-72 h-72 bg-emerald-100/60 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000">
                </div>
                <div
                    class="absolute -bottom-32 left-20 w-72 h-72 bg-teal-100/60 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-4000">
                </div>
            </div>
            <div class="container mx-auto px-4">
                <nav class="pt-12">
                    <div class="flex items-center justify-between">
                        <!-- Enhanced Back Button -->
                        <a href="{{ route('plants') }}"
                            class="group flex items-center gap-3 px-5 py-2.5 bg-white/80 backdrop-blur-md rounded-xl
                          border border-green-100 hover:border-green-200 shadow-sm hover:shadow-md
                          transition-all duration-300 ease-in-out">
                            <div
                                class="flex items-center justify-center w-8 h-8 rounded-full bg-green-100/50 
                                group-hover:bg-green-500 transition-colors duration-300">
                                <svg class="w-5 h-5 text-green-600 group-hover:text-white transition-colors" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                            </div>
                            <span class="text-green-800 font-medium group-hover:text-green-600 transition-colors">
                                Back to Plants
                            </span>
                        </a>

                        <!-- Optional: Add Right Side Elements -->
                        <div class="flex items-center gap-4">
                            <button
                                class="p-2.5 text-green-600 hover:text-green-700 bg-white/80 backdrop-blur-md 
                                 rounded-lg border border-green-100 hover:border-green-200 shadow-sm 
                                 hover:shadow-md transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <button
                                class="p-2.5 text-green-600 hover:text-green-700 bg-white/80 backdrop-blur-md 
                                 rounded-lg border border-green-100 hover:border-green-200 shadow-sm 
                                 hover:shadow-md transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="container mx-auto px-4 py-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                    <!-- Enhanced Image Gallery with Improved Interactions -->
                    <div class="sticky top-24 space-y-6">
                        <div class="group relative">
                            <!-- Main Plant Image with Hover Effects -->
                            <div
                                class="overflow-hidden rounded-3xl shadow-2xl transition-all duration-500 group-hover:shadow-green-200/50">
                                <div class="relative h-[600px] overflow-hidden">
                                    <img src="{{ $plant->image ? asset('storage/images/plants/' . $plant->image) : asset('assets/images/plant.jpeg') }}"
                                        alt="{{ $plant->name }}"
                                        class="w-full h-full object-cover transition-transform duration-700 transform group-hover:scale-105">

                                    <!-- Gradient Overlay -->
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                    </div>
                                </div>

                                <!-- QR Code Positioning and Styling -->
                                @if ($plant->qr_image)
                                    <div
                                        class="absolute bottom-6 right-6 transform transition-all duration-500 group-hover:translate-y-0 translate-y-2 opacity-90 group-hover:opacity-100">
                                        <div
                                            class="bg-white/90 backdrop-blur-md p-4 rounded-2xl shadow-xl border border-white/20 hover:shadow-lg transition-shadow duration-300">
                                            <img src="{{ asset('storage/' . $plant->qr_image) }}" alt="QR Code"
                                                class="w-32 h-32 object-contain">
                                            <a href="{{ route('download-qr', $plant->id) }}"
                                                class="mt-3 flex items-center justify-center gap-2 px-4 py-2 bg-green-600 hover:bg-green-700 
                        text-white rounded-lg transition-colors duration-300 text-sm font-medium shadow-md">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                                </svg>
                                                Download QR
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Improved Thumbnail Gallery -->
                        @if ($plant->images && $plant->images->count() > 0)
                            <div class="relative">
                                <!-- Thumbnails Scroll Container -->
                                <div class="overflow-x-auto pb-4 hide-scrollbar">
                                    <div class="flex gap-4 min-w-full">
                                        @foreach ($plant->images as $image)
                                            <div class="group/thumb cursor-pointer relative flex-shrink-0">
                                                <div
                                                    class="relative w-32 h-32 overflow-hidden rounded-2xl shadow-md hover:shadow-xl transition-all duration-300">
                                                    <img src="{{ asset('storage/images/plants/' . $image->image_url) }}"
                                                        alt="Plant image"
                                                        class="w-full h-full object-cover transition-transform duration-500 transform group-hover/thumb:scale-110">
                                                    <!-- Enhanced Hover Effect -->
                                                    <div
                                                        class="absolute inset-0 bg-gradient-to-t from-green-900/20 to-transparent opacity-0 group-hover/thumb:opacity-100 transition-opacity duration-300">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Scroll Indicators -->
                                <div class="absolute -left-4 top-1/2 -translate-y-1/2">
                                    <button class="p-2 rounded-full bg-white/80 shadow-lg hover:bg-white transition-colors">
                                        <svg class="w-6 h-6 text-green-700" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="absolute -right-4 top-1/2 -translate-y-1/2">
                                    <button class="p-2 rounded-full bg-white/80 shadow-lg hover:bg-white transition-colors">
                                        <svg class="w-6 h-6 text-green-700" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>



                    <!-- Enhanced Plant Information Section -->
                    <div class="space-y-8 relative">
                        <!-- Decorative Line -->
                        <div class="absolute left-0 top-0 h-24 w-px bg-gradient-to-b from-green-200 to-transparent"></div>

                        <div class="pl-6">
                            <!-- Plant Title with Enhanced Typography -->
                            <div class="space-y-3 mb-8">
                                <h1 class="text-5xl font-extrabold text-green-900 leading-tight">
                                    {{ $plant->name }}
                                </h1>
                                <p class="text-2xl text-green-700 italic font-serif">
                                    {{ $plant->scientific_name }}
                                </p>
                                @if ($plant->common_name)
                                    <div class="flex items-center gap-2 mt-2">
                                        <span class="w-8 h-px bg-green-200"></span>
                                        <p class="text-xl text-gray-600">
                                            Common Name: {{ $plant->common_name }}
                                        </p>
                                    </div>
                                @endif
                            </div>

                            <!-- Refined Classification Card -->

                            <div
                                class="group bg-white border border-green-100 rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 relative overflow-hidden">
                                <!-- Decorative Background Pattern -->
                                <div class="absolute inset-0 opacity-[0.02] pointer-events-none"
                                    style="background-image: url('data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M54.627,25.6c0,0-20.8-21.6-42.667,0C11.96,25.6-8.84,47.2,12.627,47.2s41.6-21.6,41.6-21.6' style='fill:none;stroke:%2322c55e;stroke-width:2;stroke-opacity:0.2'/%3E%3C/svg%3E')">
                                </div>

                                <!-- Title Section with Icon -->
                                <div class="flex items-center gap-3 mb-8 border-b border-green-100 pb-4">
                                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                    </svg>
                                    <h2 class="text-2xl font-bold text-green-800">Taxonomic Classification</h2>
                                </div>

                                <!-- Classification Grid with Enhanced Visual Design -->
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                    @foreach (['kingdom', 'division', 'class', 'order', 'family', 'genus', 'species'] as $taxon)
                                        @if (!empty($plant->{$taxon}) && !empty($plant->{$taxon}->name))
                                            <div
                                                class="group/item bg-gradient-to-br from-green-50 to-emerald-50/50 p-4 rounded-xl border border-green-100/50 hover:shadow-md transition-all duration-300">
                                                <span
                                                    class="block text-xs font-medium uppercase tracking-wider text-green-600 mb-1 group-hover/item:text-green-700 transition-colors">
                                                    {{ ucfirst($taxon) }}
                                                </span>
                                                <p
                                                    class="font-semibold text-green-900 group-hover/item:text-green-800 transition-colors">
                                                    {{ $plant->{$taxon}->name }}
                                                </p>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>

                            </div>

                            <!-- Enhanced Description Card -->
                            <div
                                class="mt-8 bg-white border border-green-50 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-500 relative overflow-hidden">
                                <!-- Decorative Leaf Pattern -->
                                <div class="absolute -right-16 -top-16 w-32 h-32 bg-green-50 rounded-full opacity-50">
                                </div>
                                <div class="absolute -right-12 -top-12 w-24 h-24 bg-emerald-50 rounded-full opacity-50">
                                </div>

                                <!-- Title Section with Icon -->
                                <div class="flex items-center gap-3 mb-6 relative">
                                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <h2 class="text-2xl font-bold text-green-800">Description</h2>
                                </div>

                                <!-- Description Text with Enhanced Typography -->
                                <div class="relative">
                                    <p class="text-gray-700 leading-relaxed text-lg">
                                        {{ $plant->description }}
                                    </p>
                                    <!-- Decorative Line -->
                                    <div
                                        class="absolute -left-8 top-0 bottom-0 w-px bg-gradient-to-b from-green-100 via-green-50 to-transparent">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detailed Information Sections with Enhanced Layout -->
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Habitat & Chemical Information -->
                <div
                    class="group bg-white border border-green-50 rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 relative overflow-hidden">
                    <!-- Decorative Background -->
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-green-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>

                    <!-- Title with Icon -->
                    <div class="flex items-center gap-3 mb-6 border-b border-green-100 pb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h2 class="text-2xl font-bold text-green-800">Habitat & Composition</h2>
                    </div>

                    <div class="space-y-6 relative">
                        @if ($plant->habitat)
                            <div class="group/item bg-green-50/80 p-5 rounded-xl hover:bg-green-50 transition-colors">
                                <h3
                                    class="flex items-center gap-2 text-sm font-semibold uppercase tracking-wider text-green-700 mb-3">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Natural Habitat
                                </h3>
                                <p class="text-gray-700 leading-relaxed">{{ $plant->habitat }}</p>
                            </div>
                        @endif

                        @if ($plant->chemical_compounds)
                            <div class="group/item bg-green-50/80 p-5 rounded-xl hover:bg-green-50 transition-colors">
                                <h3
                                    class="flex items-center gap-2 text-sm font-semibold uppercase tracking-wider text-green-700 mb-3">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                    </svg>
                                    Chemical Compounds
                                </h3>
                                <p class="text-gray-700 leading-relaxed">{{ $plant->chemical_compounds }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Plant Usage Information -->
                @if ($plant->partUseds->count() > 0)
                    <div
                        class="group bg-white border border-green-50 rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 relative overflow-hidden">
                        <div class="flex items-center gap-3 mb-6 border-b border-green-100 pb-4">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            <h2 class="text-2xl font-bold text-green-800">Plant Usage</h2>
                        </div>

                        <div class="space-y-4">
                            @foreach ($plant->partUseds as $partUsed)
                                <div
                                    class="group/item bg-green-50/80 p-5 rounded-xl hover:bg-green-50 transition-all duration-300">
                                    <h3 class="flex items-center gap-2 font-bold text-green-800 mb-3">
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        {{ $partUsed->part }}
                                    </h3>
                                    <p class="text-gray-700 leading-relaxed">{{ $partUsed->usage }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Safety Information -->
                @if ($plant->pharmocologyAspect)
                    <div
                        class="group bg-white border border-green-50 rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 relative overflow-hidden">
                        <div class="flex items-center gap-3 mb-6 border-b border-green-100 pb-4">
                            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <h2 class="text-2xl font-bold text-red-800">Safety Information</h2>
                        </div>

                        <div class="space-y-4">
                            @foreach (['toxicity', 'contraindications', 'warnings', 'precautions', 'side_effects'] as $aspect)
                                @if ($plant->pharmocologyAspect->{$aspect})
                                    <div
                                        class="group/item bg-red-50/80 p-5 rounded-xl hover:bg-red-50 transition-all duration-300">
                                        <h3
                                            class="flex items-center gap-2 text-sm font-semibold uppercase tracking-wider text-red-700 mb-3">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                            </svg>
                                            {{ str_replace('_', ' ', $aspect) }}
                                        </h3>
                                        <p class="text-gray-700 leading-relaxed">
                                            {{ $plant->pharmocologyAspect->{$aspect} }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="container mx-auto px-4 py-12">
            <div class="bg-white border border-green-50 rounded-2xl p-8 shadow-xl relative overflow-hidden">
                <!-- Decorative Background Elements -->
                <div
                    class="absolute top-0 right-0 w-64 h-64 bg-green-50 rounded-full -translate-y-1/2 translate-x-1/2 opacity-50">
                </div>
                <div
                    class="absolute bottom-0 left-0 w-64 h-64 bg-emerald-50 rounded-full translate-y-1/2 -translate-x-1/2 opacity-50">
                </div>

                <!-- Section Header -->
                <div class="relative flex items-center gap-4 mb-8 border-b border-green-100 pb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <h2 class="text-3xl font-bold text-green-800">Community Discussion</h2>
                    <span class="text-green-600 text-sm font-medium bg-green-50 px-3 py-1 rounded-full ml-auto">
                        {{ $plant->comments()->count() }} Comments
                    </span>
                </div>

                <!-- Enhanced Comment Form -->
                @auth
                    <div class="mb-10 relative">
                        <form action="{{ route('comments.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <input type="hidden" name="plant_id" value="{{ $plant->id }}">

                            <!-- User Avatar and Textarea Container -->
                            <div class="flex gap-4">
                                <div
                                    class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                                    <span class="text-green-600 font-semibold">{{ substr(auth()->user()->name, 0, 1) }}</span>
                                </div>

                                <div class="flex-grow">
                                    <textarea name="content" rows="4"
                                        class="w-full rounded-xl border-2 border-green-100 focus:border-green-500 focus:ring-2 focus:ring-green-200 
                                       bg-white transition-all duration-300 p-4 text-gray-700 placeholder-green-300"
                                        placeholder="Share your insights about this fascinating plant..."></textarea>

                                    <div class="flex items-center justify-between mt-3">
                                        <p class="text-sm text-green-600">
                                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Be kind and constructive in your comments
                                        </p>
                                        <button type="submit"
                                            class="px-6 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700 
                                           transition-all duration-300 transform hover:-translate-y-0.5 
                                           focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2
                                           flex items-center gap-2 font-medium">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                            </svg>
                                            Post Comment
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="mb-10 bg-green-50 rounded-xl p-6 text-center">
                        <p class="text-green-800 mb-3">Join the discussion by signing in</p>
                        <a href="{{ route('login') }}"
                            class="inline-flex items-center gap-2 px-6 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-all duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            Sign In to Comment
                        </a>
                    </div>
                @endauth

                <!-- Enhanced Comments List -->
                <div class="space-y-6">
                    @foreach ($plant->comments()->latest()->get() as $comment)
                        <div
                            class="group bg-green-50/50 hover:bg-green-50 rounded-xl p-6 border border-green-100 
                            shadow-sm hover:shadow-md transition-all duration-300">
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                                    <span
                                        class="text-green-600 font-semibold">{{ substr($comment->user->name, 0, 1) }}</span>
                                </div>

                                <div class="flex-grow">
                                    <div class="flex items-center justify-between mb-2">
                                        <div>
                                            <span class="font-bold text-green-800">{{ $comment->user->name }}</span>
                                            <span class="text-sm text-green-600 ml-2">•</span>
                                            <span class="text-sm text-green-600">
                                                {{ $comment->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                    </div>
                                    <p class="text-gray-700 leading-relaxed">{{ $comment->content }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Related Plants Section -->
        <div class="container mx-auto px-4 py-12">
            <div class="bg-white border border-green-50 rounded-2xl p-8 shadow-xl relative overflow-hidden">
                <!-- Decorative Background Elements -->
                <div
                    class="absolute top-0 right-0 w-64 h-64 bg-green-50 rounded-full -translate-y-1/2 translate-x-1/2 opacity-50">
                </div>
                <div
                    class="absolute bottom-0 left-0 w-64 h-64 bg-emerald-50 rounded-full translate-y-1/2 -translate-x-1/2 opacity-50">
                </div>

                <!-- Section Header -->
                <div class="relative flex items-center gap-4 mb-8 border-b border-green-100 pb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M12 2a10 10 0 00-7.071 17.071A10 10 0 1012 2zM12 12h.01M12 8h.01M12 16h.01" />
                    </svg>
                    <h2 class="text-3xl font-bold text-green-800">Related Plants</h2>
                </div>

                <!-- Related Plants Grid -->
                @if ($relatedPlants->isEmpty())
                    <div class="text-center py-6 text-gray-600">
                        <p class="text-lg">No related plants found.</p>
                        <p class="text-sm">Try exploring other plant categories or searching by different tags.</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach ($relatedPlants as $relatedPlant)
                            <a href="{{ route('plants.show', $relatedPlant->id) }}"
                                class="group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                                <div class="aspect-w-16 aspect-h-12 overflow-hidden">
                                    <img src="{{ $relatedPlant->image ? asset('storage/images/plants/' . $relatedPlant->image) : asset('assets/images/plant.jpeg') }}"
                                        alt="{{ $relatedPlant->name }}"
                                        class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                                </div>
                                <div class="p-4">
                                    <h3 class="font-semibold text-green-800">{{ $relatedPlant->name }}</h3>
                                    <p class="text-sm text-gray-600">{{ $relatedPlant->scientific_name }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection
