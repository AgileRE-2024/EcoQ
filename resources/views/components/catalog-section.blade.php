{{-- resources/views/components/catalog-section.blade.php --}}

<section class="relative min-h-screen bg-gradient-to-b from-green-50 via-green-100 to-green-200 py-24 overflow-hidden">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        {{-- Main Content Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            {{-- Text Content --}}
            <div class="space-y-8 order-2 lg:order-1">
                <div class="space-y-4">
                    <div class="flex items-center space-x-2">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.25v13.5M7.75 12h8.5"></path>
                        </svg>
                        <span class="text-green-600 font-medium">Our Collection</span>
                    </div>
                    <h2 class="text-4xl sm:text-5xl font-serif font-bold text-green-900 leading-tight">
                        Discover Nature's <br>
                        <span class="text-green-700">Finest Selection</span>
                    </h2>
                    <p class="text-lg text-green-800 leading-relaxed max-w-xl">
                        Immerse yourself in our carefully curated collection of botanical wonders.
                        From rare exotic species to beloved classics, each plant tells a unique story
                        of nature's artistry.
                    </p>
                </div>

                {{-- CTA Buttons --}}
                <div class="flex flex-wrap gap-4 mt-8">
                    <a href=""
                        class="group px-8 py-4 bg-green-600 text-white font-medium rounded-full hover:bg-green-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl flex items-center space-x-2">
                        <span>Browse Collection</span>
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-300" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                    <a href="#"
                        class="group px-8 py-4 border-2 border-green-600 text-green-600 font-medium rounded-full hover:bg-green-50 transform hover:scale-105 transition-all duration-300 flex items-center space-x-2">
                        <span>Learn More</span>
                        <svg class="w-4 h-4 group-hover:rotate-12 transition-transform duration-300" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </a>
                </div>

                {{-- Featured Categories --}}
                <div class="mt-12">
                    <h3 class="text-xl font-semibold text-green-800 mb-4">Featured Categories</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                        @foreach (['Indoor Plants', 'Succulents', 'Herbs', 'Flowering Plants', 'Tropical Plants', 'Bonsai'] as $category)
                            <a href="#"
                                class="bg-white bg-opacity-50 rounded-lg p-3 text-center hover:bg-green-100 transition duration-300 text-green-700 hover:text-green-900 shadow-md hover:shadow-lg transform hover:scale-105">
                                {{ $category }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Image Grid --}}
            <div class="space-y-6 order-1 lg:order-2">
                <div class="grid grid-cols-2 gap-6">
                    <div class="transform hover:scale-105 transition-all duration-300">
                        <div class="rounded-2xl overflow-hidden shadow-xl h-64">
                            <img src="{{ asset('assets/images/plant.jpeg') }}" alt="Indoor plant collection"
                                class="w-full h-full object-cover hover:scale-110 transition-all duration-500">
                        </div>
                    </div>
                    <div class="transform hover:scale-105 transition-all duration-300 mt-12">
                        <div class="rounded-2xl overflow-hidden shadow-xl h-64">
                            <img src="{{ asset('assets/images/plant.jpeg') }}" alt="Outdoor plant collection"
                                class="w-full h-full object-cover hover:scale-110 transition-all duration-500">
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a href="" class="inline-block text-green-600 hover:text-green-700 font-medium">
                        View All Categories
                        <svg class="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Decorative Elements --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        {{-- Animated Blobs --}}
        <div
            class="absolute top-1/4 left-1/4 w-72 h-72 bg-green-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob">
        </div>
        <div
            class="absolute bottom-1/4 right-1/4 w-72 h-72 bg-yellow-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000">
        </div>

        {{-- Decorative Patterns --}}
        <div class="absolute top-0 right-0 w-64 h-64">
            <svg class="text-green-100 w-full h-full opacity-20" viewBox="0 0 24 24" fill="currentColor">
                <path
                    d="M21.88 2.15L20.68 2.55C18.6 3.24 16.9 4.7 15.8 6.48C12.84 3.5 8.11 2.64 4.28 4.76C3.61 5.17 3.04 5.72 2.58 6.34L7.45 11.21C7.9 11.06 8.36 10.97 8.82 10.97C11.19 10.97 13.12 12.9 13.12 15.27C13.12 15.73 13.03 16.19 12.88 16.64L17.86 21.62C18.47 21.15 19 20.58 19.43 19.93C21.42 16.32 20.66 11.66 17.52 8.77C19.29 7.67 20.76 5.98 21.45 3.89L21.88 2.15Z" />
            </svg>
        </div>
        <div class="absolute bottom-0 left-0 w-64 h-64 transform rotate-180">
            <svg class="text-green-100 w-full h-full opacity-20" viewBox="0 0 24 24" fill="currentColor">
                <path
                    d="M21.88 2.15L20.68 2.55C18.6 3.24 16.9 4.7 15.8 6.48C12.84 3.5 8.11 2.64 4.28 4.76C3.61 5.17 3.04 5.72 2.58 6.34L7.45 11.21C7.9 11.06 8.36 10.97 8.82 10.97C11.19 10.97 13.12 12.9 13.12 15.27C13.12 15.73 13.03 16.19 12.88 16.64L17.86 21.62C18.47 21.15 19 20.58 19.43 19.93C21.42 16.32 20.66 11.66 17.52 8.77C19.29 7.67 20.76 5.98 21.45 3.89L21.88 2.15Z" />
            </svg>
        </div>
    </div>
</section>

{{-- Styles --}}
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
</style>
