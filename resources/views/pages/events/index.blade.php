@extends('layouts.app')

@section('title', 'Daftar Kegiatan')

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
<div class="min-h-screen pt-20">
    <section class="relative bg-gradient-to-br from-green-950 via-emerald-900 to-teal-900 overflow-hidden min-h-screen">
        <!-- Enhanced Animated Background Blobs -->
        <div class="absolute inset-0">
            <div
                class="absolute top-0 left-0 w-96 h-96 bg-green-400/60 rounded-full mix-blend-multiply filter blur-xl animate-blob">
            </div>
            <div
                class="absolute top-0 right-0 w-96 h-96 bg-emerald-400/60 rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-2000">
            </div>
            <div
                class="absolute -bottom-8 left-20 w-96 h-96 bg-teal-400/60 rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-4000">
            </div>
        </div>

        <!-- Enhanced Nature Pattern Overlay with Parallax Effect -->
        <div class="absolute inset-0 bg-repeat opacity-10 transform hover:scale-105 transition-transform duration-1000"
             style="background-image: url('data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M54.627,25.6c0,0-20.8-21.6-42.667,0C11.96,25.6-8.84,47.2,12.627,47.2s41.6-21.6,41.6-21.6' style='fill:none;stroke:%23ffffff;stroke-width:2;stroke-opacity:0.2'/%3E%3C/svg%3E')">
        </div>

        <!-- Enhanced Floating Nature Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <!-- Multiple Floating Leaves with Different Animations -->
            @for ($i = 1; $i <= 5; $i++)
            <div class="absolute floating"
                 style="
                    animation-delay: {{ $i * 0.5 }}s;
                    top: {{ rand(10, 90) }}%;
                    left: {{ rand(10, 90) }}%;
                ">
                <svg class="w-{{ rand(8, 16) }} h-{{ rand(8, 16) }} text-green-300/30 transform rotate-{{ rand(0, 360) }} swaying"
                     fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M17 8C8 10 5.9 16.17 3.82 21.34L5.71 22l.95-2.3c.48.17.98.3 1.34.3 11 0 14-17 14-17C21 5 14 5.25 9 6.25S2 11.5 2 13.5C2 15.5 3.75 17.25 3.75 17.25C7 8 17 8 17 8z" />
                </svg>
            </div>
            @endfor
        </div>

        <!-- Enhanced Main Content -->
        <div class="relative container mx-auto px-4 py-32 sm:py-40 lg:py-48">
            <div class="max-w-5xl mx-auto text-center space-y-12">
                <!-- Enhanced Header Section -->
                <div class="space-y-6">
                    <h1 class="text-4xl sm:text-5xl lg:text-7xl font-bold text-white leading-tight text-shadow">
                        Expand Your Knowledge at
                        <span class="relative inline-block">
                                <span class="relative z-10 text-teal-400 shimmer">Our Events</span>
                                <div
                                    class="absolute bottom-0 left-0 w-full h-4 bg-green-900/30 -skew-x-6 transform hover:skew-x-0 transition-transform duration-300">
                                </div>
                            </span>
                    </h1>
                    <p class="text-xl sm:text-2xl lg:text-3xl text-green-100/90 text-shadow">
                        Explore, engage, and enjoy—your adventure starts here!
                    </p>
                </div>

                <!-- Enhanced Search Bar -->
                <div class="max-w-2xl mx-auto transform hover:scale-105 transition-all duration-300">
                    <form action="" method="GET" class="relative group">
                        <input type="text" name="query" placeholder="Search Events You Looking For..."
                               class="w-full px-6 py-5 rounded-full border-2 border-green-400/50
                            glass-effect text-green-800 placeholder-green-600/50
                            focus:border-green-400 focus:outline-none focus:ring-4 focus:ring-green-400/30
                            transition-all duration-300 pl-14 pr-36
                            shadow-lg group-hover:shadow-2xl">

                        <svg class="w-6 h-6 text-green-600/70 absolute left-5 top-1/2 transform -translate-y-1/2 transition-transform duration-300 group-hover:scale-110"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>

                        <button type="submit"
                                class="absolute right-3 top-1/2 transform -translate-y-1/2
                            bg-gradient-to-r from-emerald-600 to-teal-600
                            text-white px-8 py-3 rounded-full
                            hover:from-green-900 hover:to-emerald-900
                            focus:ring-2 focus:ring-green-900 focus:ring-offset-2
                            transition-all duration-300 shadow-md
                            font-medium">
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Enhanced Bottom Decoration -->
        <div class="absolute bottom-0 left-0 right-0 h-40 bg-gradient-to-t from-green-800/30 to-transparent"></div>
    </section>
    <section class="relative bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50 py-24 overflow-hidden">
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
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-800 mb-6 relative  text-center">
                Events
                <div
                    class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-4 w-24 h-1 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full">
                </div>
            </h2>
            <div class="mb-16">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-16">
                    @foreach ($events as $event)
                    <div
                        class="group relative bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden">
                        {{-- Image Container --}}
                        <div class="relative aspect-w-16 aspect-h-12 overflow-hidden">
                            <img src="{{ asset('storage/images/events/' . $event->image) }}" alt="{{ $event->title }}"
                                 class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute top-4 left-4">
                                        <span
                                            class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-medium bg-green-500 text-white shadow-lg">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            Upcoming
                                        </span>
                            </div>
                        </div>

                        {{-- Content --}}
                        <div class="p-6">
                            <h3
                                class="text-2xl font-bold text-green-900 mb-3 group-hover:text-green-600 transition-colors">
                                {{ $event['title'] }}
                            </h3>
                            <div class="flex items-center text-gray-600 mb-2">
                                <i class="fas fa-map-pin mr-5 text-green-800"></i>
                                <p>{{ $event['location'] }}</p>
                            </div>
                            <div class="flex items-center text-gray-600 mb-2">
                                <i class="fas fa-calendar-alt mr-4 text-green-800"></i>
                                <p>{{ \Carbon\Carbon::parse($event->date)->locale('id')->translatedFormat('l, j F Y') }}</p>
                            </div>
                            <div class="flex items-center text-gray-600 mb-4">
                                <i class="fas fa-clock mr-4 text-green-800"></i>
                                <p>{{ \Carbon\Carbon::parse($event->time)->format('H.i') }} - Selesai</p>
                            </div>

                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <a href="#"
                                   class="inline-flex items-center text-green-600 hover:text-green-700 font-medium transition-colors">
                                    View Details
                                    <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform"
                                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </section>
</div>
@endsection
