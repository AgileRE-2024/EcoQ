@extends('dashboard.layouts.template')

@section('content')
    @push('styles')
        <style>
            @keyframes float {

                0%,
                100% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-10px);
                }
            }

            @keyframes sway {

                0%,
                100% {
                    transform: rotate(-3deg);
                }

                50% {
                    transform: rotate(3deg);
                }
            }

            @keyframes shimmer {
                0% {
                    background-position: -1000px 0;
                }

                100% {
                    background-position: 1000px 0;
                }
            }

            .float-animation {
                animation: float 6s ease-in-out infinite;
            }

            .sway-animation {
                animation: sway 8s ease-in-out infinite;
                transform-origin: center bottom;
            }

            .leaf-pattern {
                background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M54.627,25.6c0,0-20.8-21.6-42.667,0C11.96,25.6-8.84,47.2,12.627,47.2s41.6-21.6,41.6-21.6' style='fill:none;stroke:%2322c55e;stroke-width:2;stroke-opacity:0.2'/%3E%3C/svg%3E");
            }

            .shimmer {
                background: linear-gradient(90deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0) 100%);
                background-size: 1000px 100%;
                animation: shimmer 2s infinite linear;
            }
        </style>
    @endpush

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
                        <a href="{{ route('plants.index') }}"
                            class="text-green-600 hover:text-green-800 transition-colors duration-200">
                            Plants
                        </a>
                    </li>
                    <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <li class="text-green-800 font-medium">{{ $plant->name }}</li>
                </ol>

                <a href="{{ route('plants.index') }}"
                    class="group inline-flex items-center px-4 py-2 text-sm font-medium text-green-700 hover:text-green-900 bg-green-50 hover:bg-green-100 rounded-lg transition-all duration-200">
                    <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform duration-200"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back to Plants
                </a>
            </nav>

            <!-- Hero Section -->
            <div class="relative rounded-3xl overflow-hidden mb-8 bg-white shadow-xl">
                @if ($plant->image)
                    <div class="relative h-[60vh] max-h-[600px]">
                        <img src="{{ asset('storage/images/plants/' . $plant->image) }}" alt="{{ $plant->name }}"
                            class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

                        <!-- Hero Content -->
                        <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                            <h1 class="text-5xl font-bold mb-4 leading-tight">{{ $plant->name }}</h1>

                            <!-- Quick Stats -->
                            <div class="mt-8 grid grid-cols-2 sm:grid-cols-4 gap-6">
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                                    <p class="text-green-300 text-sm">Family</p>
                                    <p class="font-semibold">{{ $plant->family->name ?? 'N/A' }}</p>
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                                    <p class="text-green-300 text-sm">Habitat</p>
                                    <p class="font-semibold">{{ $plant->habitat ?? 'N/A' }}</p>
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                                    <p class="text-green-300 text-sm">Parts Used</p>
                                    <p class="font-semibold">{{ $plant->partUseds->count() }} parts</p>
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                                    <p class="text-green-300 text-sm">Images</p>
                                    <p class="font-semibold">{{ $plant->images->count() }} photos</p>
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
                            <!-- Plant Details -->
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
                                        <h2 class="text-2xl font-bold text-green-800">Botanical Information</h2>
                                        <p class="text-green-600">Detailed plant characteristics and taxonomy</p>
                                    </div>
                                </div>

                                <div class="grid gap-6">
                                    <div
                                        class="bg-white/60 rounded-xl p-6 hover:bg-white/80 transition-colors duration-200">
                                        <label class="text-sm font-medium text-green-600">Common Name</label>
                                        <p class="text-gray-800 text-lg mt-1">{{ $plant->common_name ?? 'N/A' }}</p>
                                    </div>
                                    <div
                                        class="bg-white/60 rounded-xl p-6 hover:bg-white/80 transition-colors duration-200">
                                        <label class="text-sm font-medium text-green-600">Scientific Name</label>
                                        <p class="italic text-gray-800 text-lg mt-1">{{ $plant->scientific_name ?? 'N/A' }}
                                        </p>
                                    </div>
                                    <div
                                        class="bg-white/60 rounded-xl p-6 hover:bg-white/80 transition-colors duration-200">
                                        <label class="text-sm font-medium text-green-600">Description</label>
                                        <p class="text-gray-700 mt-2 leading-relaxed">{{ $plant->description ?? 'N/A' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Scientific Classification -->
                            <div
                                class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                                <div class="flex items-center gap-4 mb-6">
                                    <div class="p-3 bg-blue-100 rounded-full">
                                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h2 class="text-2xl font-bold text-blue-800">Scientific Classification</h2>
                                        <p class="text-blue-600">Taxonomic hierarchy and classification</p>
                                    </div>
                                </div>

                                @php
                                    $classification = [
                                        'Kingdom' =>
                                            $plant->species->genus->family->order->class->phylum->kingdom->name ??
                                            'N/A',
                                        'Phylum' => $plant->species->genus->family->order->class->phylum->name ?? 'N/A',
                                        'Class' => $plant->species->genus->family->order->class->name ?? 'N/A',
                                        'Order' => $plant->species->genus->family->order->name ?? 'N/A',
                                        'Family' => $plant->species->genus->family->name ?? 'N/A',
                                        'Genus' => $plant->species->genus->name ?? 'N/A',
                                        'Species' => $plant->species->name ?? 'N/A',
                                    ];
                                @endphp

                                <div class="grid grid-cols-2 gap-4">
                                    @foreach ($classification as $label => $value)
                                        <div
                                            class="bg-white/60 rounded-xl p-4 hover:bg-white/80 transition-colors duration-200">
                                            <label class="text-sm font-medium text-blue-600">{{ $label }}</label>
                                            <p class="text-gray-800 mt-1">{{ $value }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Sidebar -->
                        <div class="space-y-8">
                            <!-- QR Code -->
                            @if ($plant->qr_image)
                                <div
                                    class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 text-center">
                                    <div class="mb-4">
                                        <h3 class="text-xl font-bold text-gray-800">Plant QR Code</h3>
                                        <p class="text-gray-600 text-sm">Scan to view plant details</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-4 rounded-xl inline-block">
                                        <img src="{{ asset('storage/' . $plant->qr_image) }}" alt="QR Code"
                                            class="w-48 h-48 mx-auto">
                                    </div>
                                </div>
                            @endif

                            <!-- Parts Used -->
                            <div
                                class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                                <div class="flex items-center gap-3 mb-6">
                                    <div class="p-2 bg-purple-100 rounded-full">
                                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                        </svg>
                                    </div>
                                    <h3 class="text-xl font-bold text-purple-800">Parts Used</h3>
                                </div>

                                @if ($plant->partUseds->isNotEmpty())
                                    <div class="space-y-4">
                                        @foreach ($plant->partUseds as $part_used)
                                            <div
                                                class="bg-white/60 rounded-xl p-4 hover:bg-white/80 transition-colors duration-200">
                                                <h4 class="font-medium text-purple-700">{{ $part_used->part }}</h4>
                                                <p class="text-gray-600 mt-2 text-sm">{{ $part_used->usage }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-gray-600 text-center py-4">No parts used data available.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Pharmacological Aspects -->
                    <div
                        class="mt-8 bg-gradient-to-br from-red-50 to-orange-50 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="p-3 bg-red-100 rounded-full">
                                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-red-800">Pharmacological Aspects</h2>
                                <p class="text-red-600">Safety information and precautions</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @php
                                $pharmacology = [
                                    'Toxicity' => $plant->pharmacologyAspect->toxicity ?? 'N/A',
                                    'Contraindications' => $plant->pharmacologyAspect->contraindications ?? 'N/A',
                                    'Warnings' => $plant->pharmacologyAspect->warnings ?? 'N/A',
                                    'Precautions' => $plant->pharmacologyAspect->precautions ?? 'N/A',
                                    'Side Effects' => $plant->pharmacologyAspect->side_effects ?? 'N/A',
                                ];
                            @endphp

                            @foreach ($pharmacology as $label => $value)
                                <div class="bg-white/60 rounded-xl p-6 hover:bg-white/80 transition-colors duration-200">
                                    <label class="text-sm font-medium text-red-600">{{ $label }}</label>
                                    <p class="text-gray-800 mt-2">{{ $value }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Plant Gallery -->
                    @if ($plant->images->isNotEmpty())
                        <div
                            class="mt-8 bg-gradient-to-br from-yellow-50 to-amber-50 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="p-3 bg-yellow-100 rounded-full">
                                    <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-2xl font-bold text-yellow-800">Plant Gallery</h2>
                                    <p class="text-yellow-600">Visual documentation of the plant</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                                @foreach ($plant->images as $image)
                                    <div
                                        class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300">
                                        <img src="{{ asset('storage/images/plants/' . $image->image_url) }}"
                                            alt="Plant image"
                                            class="w-full h-48 object-cover transform group-hover:scale-110 transition-transform duration-500">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Garden Information (Admin Only) -->
                    @if (Auth::user()->role == 'admin')
                        <div
                            class="mt-8 bg-gradient-to-br from-yellow-50 to-amber-50 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="p-3 bg-yellow-100 rounded-full">
                                    <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-2xl font-bold text-yellow-800">Garden Information</h2>
                                    <p class="text-yellow-600">Administrative details about the plant's location</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="bg-white/60 rounded-xl p-6 hover:bg-white/80 transition-colors duration-200">
                                    <label class="text-sm font-medium text-yellow-600">Garden Name</label>
                                    <p class="text-gray-800 mt-2">{{ $plant->garden->name ?? 'N/A' }}</p>
                                </div>
                                <div class="bg-white/60 rounded-xl p-6 hover:bg-white/80 transition-colors duration-200">
                                    <label class="text-sm font-medium text-yellow-600">Garden Location</label>
                                    <p class="text-gray-800 mt-2">{{ $plant->garden->location ?? 'N/A' }}</p>
                                </div>
                                <div class="bg-white/60 rounded-xl p-6 hover:bg-white/80 transition-colors duration-200">
                                    <label class="text-sm font-medium text-yellow-600">Garden Owner</label>
                                    <p class="text-gray-800 mt-2">{{ $plant->garden->user->name ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!-- Tags Section -->
                    <div
                        class="mt-8 bg-gradient-to-br from-teal-50 to-emerald-50 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="p-3 bg-teal-100 rounded-full">
                                <svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-teal-800">Plant Tags</h2>
                                <p class="text-teal-600">Categories and characteristics</p>
                            </div>
                        </div>

                        @if ($plant->tags->isNotEmpty())
                            <div class="flex flex-wrap gap-2">
                                @foreach ($plant->tags as $tag)
                                    <span
                                        class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-teal-100 text-teal-800 hover:bg-teal-200 transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-1.5 text-teal-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a4 4 0 014-4z" />
                                        </svg>
                                        {{ $tag->name }}
                                    </span>
                                @endforeach
                            </div>
                        @else
                            <p class="text-center text-gray-500 py-4">No tags available for this plant.</p>
                        @endif
                    </div>
                    <!-- Comments Section -->
                    <div
                        class="mt-8 bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="p-3 bg-indigo-100 rounded-full">
                                <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-indigo-800">Comments</h2>
                                <p class="text-indigo-600">Join the discussion about this plant</p>
                            </div>
                        </div>


                        <!-- Comments List -->
                        <div class="space-y-6">
                            @forelse ($plant->comments()->latest()->get() as $comment)
                                <div
                                    class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow duration-200">
                                    <div class="flex items-start space-x-4">
                                        <img src="{{ $comment->user->avatar ?? asset('images/default-avatar.png') }}"
                                            alt="{{ $comment->user->name }}" class="w-12 h-12 rounded-full object-cover">
                                        <div class="flex-1">
                                            <div class="flex items-center justify-between">
                                                <h4 class="text-lg font-semibold text-gray-800">{{ $comment->user->name }}
                                                </h4>
                                                <span
                                                    class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                                            </div>
                                            <p class="mt-2 text-gray-700">{{ $comment->content }}</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center text-gray-500 py-4">No comments yet. Be the first to share your
                                    thoughts!</p>
                            @endforelse
                        </div>

                        <!-- Pagination (if needed) -->
                        @if ($plant->comments()->count() > 10)
                            <div class="mt-8">
                                {{ $plant->comments()->paginate(10)->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
