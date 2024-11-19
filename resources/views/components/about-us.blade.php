<section class="py-24 relative overflow-hidden bg-gradient-to-br from-green-50 via-white to-green-50">
    <!-- Organic Shape Decorations -->
    <div class="absolute inset-0 pointer-events-none opacity-10">
        <!-- Organic blob shapes -->
        <svg class="absolute right-0 top-0 w-96 h-96 text-green-600 transform translate-x-1/3 -translate-y-1/3"
            viewBox="0 0 200 200">
            <path fill="currentColor"
                d="M44.3,-76.8C58.4,-69.4,71.4,-58.8,79.7,-45.1C88,-31.4,91.7,-15.7,89.8,-1.1C88,13.6,80.5,27.1,72.1,39.6C63.7,52.1,54.4,63.5,42.2,71.7C30,79.9,15,84.9,0,84.8C-15.1,84.8,-30.2,79.7,-43.5,71.6C-56.8,63.5,-68.3,52.4,-76.3,39C-84.3,25.6,-88.7,9.9,-87.4,-5.4C-86.1,-20.7,-79.1,-35.7,-69.1,-47.8C-59.1,-59.9,-46.2,-69.2,-32.6,-76.6C-19,-84,-9.5,-89.6,3.1,-94.8C15.7,-100,31.4,-104.8,44.3,-76.8Z"
                transform="translate(100 100)" />
        </svg>
        <svg class="absolute left-0 bottom-0 w-96 h-96 text-green-600 transform -translate-x-1/3 translate-y-1/3"
            viewBox="0 0 200 200">
            <path fill="currentColor"
                d="M42.8,-76.1C54.9,-67.2,63.7,-54.1,71.5,-40.3C79.2,-26.4,86,-11.9,84.6,1.4C83.2,14.7,73.6,26.8,65.8,39.5C58,52.2,52,65.4,41.3,73.2C30.5,81,15.3,83.3,0.4,82.6C-14.4,82,-28.8,78.4,-42.1,71.6C-55.4,64.8,-67.6,54.8,-75.8,41.8C-84,28.8,-88.2,12.9,-87.5,-2.7C-86.8,-18.3,-81.2,-33.6,-72.3,-46.2C-63.4,-58.8,-51.3,-68.7,-37.8,-76.6C-24.3,-84.5,-9.4,-90.5,3.6,-96.5C16.5,-102.5,33,-96.6,42.8,-76.1Z"
                transform="translate(100 100)" />
        </svg>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative">
        <!-- Section Header -->
        <div class="max-w-xl mx-auto text-center mb-20">
            <span class="text-green-600 font-medium px-4 py-2 bg-green-100 rounded-full inline-block mb-4">Tentang
                Kami</span>
            <h2 class="text-4xl font-serif font-bold text-green-900 mb-6 relative inline-block">
                Melestarikan Alam, Menumbuhkan Kehidupan
                <span
                    class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-green-500 rounded-full"></span>
            </h2>
            <p class="text-gray-600 text-lg mt-8">Kami berkomitmen untuk menciptakan lingkungan yang lebih hijau dan
                berkelanjutan melalui inovasi dan edukasi.</p>
        </div>

        <!-- Main Content -->
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <!-- Left Column - Image Gallery -->
            <div class="relative">
                <!-- Main Image -->
                <div
                    class="rounded-3xl overflow-hidden shadow-2xl transform hover:scale-[1.02] transition duration-500">
                    <img src="{{ asset('assets/images/garden.jpg') }}" alt="Our Garden"
                        class="w-full h-[400px] object-cover">
                </div>
                <!-- Floating Image 1 -->
                <div
                    class="absolute -top-12 -right-12 w-48 h-48 rounded-2xl overflow-hidden shadow-xl transform hover:scale-105 transition duration-500 hidden lg:block">
                    <img src="/api/placeholder/200/200" alt="Garden Detail 1" class="w-full h-full object-cover">
                </div>
                <!-- Floating Image 2 -->
                <div
                    class="absolute -bottom-12 -left-12 w-40 h-40 rounded-2xl overflow-hidden shadow-xl transform hover:scale-105 transition duration-500 hidden lg:block">
                    <img src="/api/placeholder/200/200" alt="Garden Detail 2" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Right Column - Content -->
            <div class="space-y-8">
                <!-- Vision -->
                <div
                    class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-[1.01]">
                    <div class="flex items-center gap-4 mb-4">
                        <span class="p-3 bg-green-100 rounded-xl">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                        <h3 class="text-xl font-serif font-bold text-green-900">Visi Kami</h3>
                    </div>
                    <p class="text-gray-600">Menjadi pionir dalam pelestarian lingkungan dan pemberdayaan masyarakat
                        melalui inovasi berkelanjutan.</p>
                </div>

                <!-- Mission -->
                <div
                    class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-[1.01]">
                    <div class="flex items-center gap-4 mb-4">
                        <span class="p-3 bg-green-100 rounded-xl">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </span>
                        <h3 class="text-xl font-serif font-bold text-green-900">Misi Kami</h3>
                    </div>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-green-500 mt-1 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Mengembangkan program edukasi lingkungan yang berkelanjutan</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-green-500 mt-1 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Menciptakan solusi inovatif untuk masalah lingkungan</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-green-500 mt-1 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Memberdayakan masyarakat dalam pelestarian lingkungan</span>
                        </li>
                    </ul>
                </div>

                <!-- Values -->
                <div
                    class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-[1.01]">
                    <div class="flex items-center gap-4 mb-4">
                        <span class="p-3 bg-green-100 rounded-xl">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </span>
                        <h3 class="text-xl font-serif font-bold text-green-900">Nilai-Nilai Kami</h3>
                    </div>
                    <div class="grid grid-cols-2 gap-4 text-gray-600">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                            <span>Keberlanjutan</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                            <span>Inovasi</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                            <span>Kolaborasi</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                            <span>Integritas</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
