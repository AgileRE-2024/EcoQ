<section class="relative bg-gradient-to-b from-green-50 via-green-50/80 to-white py-24 overflow-hidden">
    <!-- Floating Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <!-- Animated leaves -->
        <div class="leaf-1 absolute top-20 left-10">
            <svg class="w-6 h-6 text-green-600/30" fill="currentColor" viewBox="0 0 24 24">
                <path d="M21 3L3 21l3.75-7.5L21 3zm-6 12l-3-3m3-3l-6 6" />
            </svg>
        </div>
        <div class="leaf-2 absolute top-40 right-20">
            <svg class="w-8 h-8 text-green-500/20" fill="currentColor" viewBox="0 0 24 24">
                <path d="M21 3L3 21l3.75-7.5L21 3zm-6 12l-3-3m3-3l-6 6" />
            </svg>
        </div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col lg:flex-row items-center justify-between space-y-12 lg:space-y-0 lg:space-x-12">
            <!-- Text Content -->
            <div class="w-full lg:w-1/2 text-center lg:text-left">
                <div class="relative inline-block">
                    <span
                        class="absolute -top-6 -left-6 w-12 h-12 bg-yellow-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse"></span>
                    <h1
                        class="text-4xl sm:text-5xl lg:text-6xl font-bold text-green-900 leading-tight font-serif relative">
                        A Beautiful <br class="hidden sm:block">
                        <span class="relative inline-block">
                            Adventure
                            <svg class="absolute -right-12 -bottom-1 w-10 h-10 text-green-600/30 transform rotate-45"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                        </span>
                        Awaits
                    </h1>
                </div>

                <p class="mt-8 text-lg sm:text-xl text-gray-700 font-sans max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                    Discover the wonders of nature, cultivate your own oasis, and embark on a journey of growth and
                    beauty with <span class="text-green-700 font-semibold">EcoGarden</span>.
                </p>

                <div
                    class="mt-10 flex flex-col sm:flex-row justify-center lg:justify-start space-y-4 sm:space-y-0 sm:space-x-6">
                    <a href="/katalog"
                        class="group px-8 py-4 bg-gradient-to-r from-green-600 to-green-500 text-white font-semibold rounded-full shadow-lg hover:shadow-green-500/30 transform hover:-translate-y-1 transition duration-300 ease-in-out">
                        <span class="flex items-center justify-center space-x-2">
                            <span>Explore Catalog</span>
                            <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </span>
                    </a>
                    <a href="#"
                        class="group px-8 py-4 border-2 border-green-600 text-green-700 font-semibold rounded-full hover:bg-green-50/80 transform hover:-translate-y-1 transition duration-300 ease-in-out">
                        <span class="flex items-center justify-center space-x-2">
                            <span>Learn More</span>
                            <svg class="w-5 h-5 transform group-hover:rotate-45 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>

            <!-- Image Content -->
            <div class="w-full lg:w-1/2 flex justify-center lg:justify-end">
                <div class="relative">
                    <!-- Gradient Overlay -->
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-green-200/40 via-green-100/20 to-transparent rounded-t-full">
                    </div>

                    <!-- Main Image Container -->
                    <div class="relative overflow-hidden rounded-t-full border-8 border-white shadow-2xl transform hover:scale-105 transition duration-700 ease-out"
                        style="width: 400px; height: 600px;">
                        <img src="{{ asset('assets/images/garden.jpg') }}" alt="Beautiful Garden Adventure"
                            class="object-cover w-full h-full transform hover:scale-110 transition duration-1000 ease-in-out">

                        <!-- Image Overlay Effects -->
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-green-900/20 to-transparent opacity-0 hover:opacity-100 transition duration-300">
                        </div>
                    </div>

                    <!-- Floating Decorative Elements -->
                    <div
                        class="absolute -top-4 -left-4 w-20 h-20 bg-yellow-400/70 rounded-full mix-blend-multiply filter blur-xl animate-blob">
                    </div>
                    <div
                        class="absolute -bottom-4 left-20 w-24 h-24 bg-green-400/70 rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-2000">
                    </div>
                    <div
                        class="absolute top-1/2 -right-4 w-16 h-16 bg-pink-300/70 rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-4000">
                    </div>

                    <!-- Additional Decorative Elements -->
                    <div class="absolute -right-8 top-1/4 transform rotate-45">
                        <svg class="w-16 h-16 text-green-600/20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Background Decorations -->
    <div
        class="absolute top-0 left-0 w-40 h-40 bg-yellow-200/40 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob">
    </div>
    <div
        class="absolute top-0 right-0 w-40 h-40 bg-pink-200/40 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000">
    </div>
    <div
        class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-40 h-40 bg-green-200/40 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000">
    </div>
</section>

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

    @keyframes float {

        0%,
        100% {
            transform: translateY(0) rotate(0);
        }

        50% {
            transform: translateY(-20px) rotate(5deg);
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

    .leaf-1 {
        animation: float 6s ease-in-out infinite;
    }

    .leaf-2 {
        animation: float 8s ease-in-out infinite reverse;
    }
</style>
