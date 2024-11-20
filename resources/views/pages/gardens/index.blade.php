@extends('layouts.app')
@section('content')
    <div class="min-h-screen pt-20">


        <section class="relative bg-gradient-to-br from-green-600 via-emerald-600 to-teal-600 overflow-hidden min-h-screen">
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
                <div class="max-w-4xl mx-auto text-center space-y-12">
                    <!-- Enhanced Header Section -->
                    <div class="space-y-6">
                        <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold text-white leading-tight text-shadow">
                            Discover Our
                            <span class="relative inline-block">
                                <span class="relative z-10 text-yellow-300 shimmer">Enchanting Gardens</span>
                                <div
                                    class="absolute bottom-0 left-0 w-full h-4 bg-green-400/30 -skew-x-6 transform hover:skew-x-0 transition-transform duration-300">
                                </div>
                            </span>
                        </h1>
                        <p class="text-xl sm:text-2xl lg:text-3xl text-green-100/90 text-shadow">
                            Explore nature's finest collections and serene landscapes
                        </p>
                    </div>

                    <!-- Enhanced Search Bar -->
                    <div class="max-w-2xl mx-auto transform hover:scale-105 transition-all duration-300">
                        <form action="" method="GET" class="relative group">
                            <input type="text" name="query" placeholder="Search gardens, plants, or features..."
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
                            bg-gradient-to-r from-green-500 to-emerald-500
                            text-white px-8 py-3 rounded-full
                            hover:from-green-600 hover:to-emerald-600
                            focus:ring-2 focus:ring-green-600 focus:ring-offset-2
                            transition-all duration-300 shadow-md
                            font-medium">
                                Search
                            </button>
                        </form>
                    </div>

                    <!-- Enhanced Quick Links -->
                    <div class="flex flex-wrap justify-center gap-6 pt-8">
                        @foreach (['Popular Gardens', 'Seasonal Highlights', 'Upcoming Events'] as $link)
                            <a href="#" class="group relative">
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-green-400 to-emerald-400 rounded-full opacity-50 blur-sm transform group-hover:scale-110 transition-transform duration-300">
                                </div>
                                <div
                                    class="relative glass-effect text-white 
                            px-8 py-4 rounded-full border border-white/20
                            transition-all duration-300 group-hover:border-white/30
                            flex items-center space-x-3">
                                    <span class="text-lg">{{ $link }}</span>
                                    <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Enhanced Bottom Decoration -->
            <div class="absolute bottom-0 left-0 right-0 h-40 bg-gradient-to-t from-green-800/30 to-transparent"></div>
        </section>

        <!-- Featured Gardens Section -->
        <section class="relative bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50 py-24 overflow-hidden">
            <!-- Enhanced Decorative Elements -->
            <div class="absolute inset-0">
                <div
                    class="absolute top-0 left-0 w-96 h-96 bg-green-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob">
                </div>
                <div
                    class="absolute top-1/2 right-1/4 w-96 h-96 bg-emerald-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000">
                </div>
                <div
                    class="absolute bottom-0 right-0 w-96 h-96 bg-teal-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000">
                </div>
            </div>

            <!-- Nature Pattern Overlay -->
            <div class="absolute inset-0 bg-repeat opacity-5"
                style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M54.627,25.6c0,0-20.8-21.6-42.667,0C11.96,25.6-8.84,47.2,12.627,47.2s41.6-21.6,41.6-21.6\' style=\'fill:none;stroke:%23000000;stroke-width:2;stroke-opacity:0.2\'/%3E%3C/svg%3E')">
            </div>

            <div class="container mx-auto px-4 relative">
                <div class="text-center mb-20">
                    <span
                        class="inline-block px-4 py-1 bg-gradient-to-r from-green-400 to-emerald-400 text-white rounded-full text-sm font-semibold mb-4 animate-pulse shadow-lg">
                        Discover Nature's Beauty
                    </span>
                    <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-800 mb-6 relative">
                        Featured Gardens
                        <div
                            class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-4 w-24 h-1 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full">
                        </div>
                    </h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                        Embark on a journey through our most enchanting and popular botanical wonders,
                        where every garden tells a unique story
                    </p>
                </div>

                <!-- Enhanced Slider Container -->
                <div class="relative px-4">
                    <div class="swiper-container overflow-visible">
                        <div class="swiper-wrapper">
                            @foreach ($featuredGardens as $garden)
                                <div class="swiper-slide p-4">
                                    <div
                                        class="group bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500 overflow-hidden transform hover:-translate-y-2">
                                        <!-- Enhanced Garden Image Container -->
                                        <div class="relative h-80 overflow-hidden">
                                            <img src="{{ $garden->image ? asset('storage/' . $garden->image) : asset('assets/images/default-garden.jpg') }}"
                                                alt="{{ $garden->name }}"
                                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-out">
                                            <!-- Enhanced Overlay -->
                                            <div
                                                class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500">
                                            </div>

                                            <!-- Enhanced Info Overlay -->
                                            <div
                                                class="absolute bottom-0 left-0 right-0 p-6 transform translate-y-full group-hover:translate-y-0 transition-transform duration-500 ease-out">
                                                <h3 class="text-3xl font-bold text-white mb-2 drop-shadow-lg">
                                                    {{ $garden->name }}</h3>
                                                <div class="flex items-center text-green-200 mb-2">
                                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span>{{ $garden->location }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Enhanced Garden Info -->
                                        <div class="p-8">
                                            <!-- Enhanced Rating Display -->
                                            <div class="flex items-center mb-4 bg-gray-50 rounded-lg p-3">
                                                <div class="flex text-yellow-400 mr-2">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <svg class="w-5 h-5 {{ $i <= $garden->rating ? 'text-yellow-400' : 'text-gray-300' }} transition-colors duration-200"
                                                            fill="currentColor" viewBox="0 0 20 20">
                                                            <path
                                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                            </path>
                                                        </svg>
                                                    @endfor
                                                </div>
                                                <div class="flex items-center">
                                                    <span
                                                        class="text-lg font-semibold text-gray-800">{{ number_format($garden->rating, 1) }}</span>
                                                    <span class="text-gray-500 ml-2">({{ $garden->reviews_count }}
                                                        reviews)</span>
                                                </div>
                                            </div>

                                            <!-- Enhanced Description -->
                                            <p class="text-gray-600 mb-8 line-clamp-3 leading-relaxed">
                                                {{ $garden->description }}</p>

                                            <!-- Enhanced Garden Features -->
                                            <div class="flex flex-wrap gap-2 mb-8">
                                                @foreach (['Seasonal Flowers', 'Guided Tours', 'Photo Spots'] as $feature)
                                                    <span class="px-3 py-1 bg-green-50 text-green-700 rounded-full text-sm">
                                                        {{ $feature }}
                                                    </span>
                                                @endforeach
                                            </div>

                                            <!-- Enhanced Explore Button -->
                                            <a href="{{ route('gardens.show', $garden->id) }}"
                                                class="group inline-flex items-center justify-center w-full px-8 py-4 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-full hover:from-green-600 hover:to-emerald-700 transition-all duration-300 transform hover:scale-[1.02] shadow-lg hover:shadow-xl">
                                                <span class="text-lg font-semibold">Explore Garden</span>
                                                <svg class="w-6 h-6 ml-2 transform group-hover:translate-x-1 transition-transform"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Enhanced Slider Pagination -->
                        <div class="swiper-pagination mt-12"></div>
                    </div>

                    <!-- Enhanced Slider Navigation -->
                    <div class="hidden md:block">
                        <button
                            class="swiper-button-prev absolute top-1/2 -left-6 transform -translate-y-1/2 bg-white rounded-full w-12 h-12 shadow-lg z-10 focus:outline-none focus:ring-2 focus:ring-green-500 hover:bg-green-50 transition-colors duration-300">
                            <svg class="w-6 h-6 text-green-600 mx-auto" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </button>
                        <button
                            class="swiper-button-next absolute top-1/2 -right-6 transform -translate-y-1/2 bg-white rounded-full w-12 h-12 shadow-lg z-10 focus:outline-none focus:ring-2 focus:ring-green-500 hover:bg-green-50 transition-colors duration-300">
                            <svg class="w-6 h-6 text-green-600 mx-auto" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </section>

    </div>
    @push('scripts')
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var swiper = new Swiper('.swiper-container', {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: true,
                    centeredSlides: true,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 1,
                        },
                        768: {
                            slidesPerView: 2,
                        },
                        1024: {
                            slidesPerView: 3,
                        },
                    },
                });
            });
        </script>
    @endpush
    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

        <style>
            /* Enhanced Animation Keyframes */
            @keyframes sway {

                0%,
                100% {
                    transform: translateX(-5px) rotate(-2deg);
                }

                50% {
                    transform: translateX(5px) rotate(2deg);
                }
            }

            @keyframes float {

                0%,
                100% {
                    transform: translateY(0) rotate(0deg);
                }

                50% {
                    transform: translateY(-20px) rotate(3deg);
                }
            }

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

            @keyframes shimmer {
                0% {
                    background-position: -1000px 0;
                }

                100% {
                    background-position: 1000px 0;
                }
            }

            /* Animation Classes */
            .animate-blob {
                animation: blob 7s infinite;
            }

            .animation-delay-2000 {
                animation-delay: 2s;
            }

            .animation-delay-4000 {
                animation-delay: 4s;
            }

            .floating {
                animation: float 6s ease-in-out infinite;
            }

            .swaying {
                animation: sway 4s ease-in-out infinite;
            }

            /* Enhanced Visual Effects */
            .shimmer {
                background: linear-gradient(90deg,
                        rgba(255, 255, 255, 0) 0%,
                        rgba(255, 255, 255, 0.2) 50%,
                        rgba(255, 255, 255, 0) 100%);
                background-size: 1000px 100%;
                animation: shimmer 3s infinite linear;
            }

            .glass-effect {
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.2);
                box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            }

            .text-shadow {
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            }

            /* Swiper Styles */
            .swiper-container {
                width: 100%;
                padding: 20px 0 60px;
            }

            .swiper-slide {
                width: 100%;
                max-width: 400px;
            }

            .swiper-pagination-bullet {
                width: 12px;
                height: 12px;
                background-color: #10B981;
                opacity: 0.5;
            }

            .swiper-pagination-bullet-active {
                opacity: 1;
            }

            .swiper-button-prev,
            .swiper-button-next {
                color: #10B981 !important;
            }
        </style>
    @endpush
@endsection
