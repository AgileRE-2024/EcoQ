@extends('dashboard.layouts.template')

@section('content')
    <div class="bg-gray-50 flex-1 p-6 md:mt-16">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 mb-6">Gardens</h1>

            <!-- Gardens Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($gardens as $garden)
                    <div
                        class="bg-white shadow-md rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                        <!-- Garden Image -->
                        <div class="h-48 bg-gray-200">
                            <img src="{{ $garden->image ? asset('storage/' . $garden->image) : asset('images/default-garden.jpg') }}"
                                alt="{{ $garden->name }}" class="w-full h-full object-cover">
                        </div>

                        <!-- Garden Details -->
                        <div class="p-6">
                            <h2 class="text-xl font-bold text-gray-900">{{ $garden->name }}</h2>
                            <p class="text-sm text-gray-500 mb-4">{{ $garden->location }}</p>

                            <!-- Description Preview -->
                            <p class="text-gray-700 text-sm line-clamp-3">{{ Str::limit($garden->description, 100) }}</p>

                            <!-- View Details Button -->
                            <a href="{{ route('gardens.show', $garden->id) }}"
                                class="mt-4 inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-150">
                                View Details
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-500">No gardens available.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
