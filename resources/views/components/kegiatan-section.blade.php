<section class="py-20 bg-gradient-to-b from-green-50 via-green-100/30 to-white relative overflow-hidden">
    <!-- Nature-inspired decorative elements -->
    <div class="absolute inset-0 pointer-events-none">
        <!-- Leaves pattern top right -->
        <svg class="absolute top-0 right-0 text-green-200/40 w-64 h-64 transform rotate-90" viewBox="0 0 100 100">
            <path d="M50 0 C50 50, 100 50, 100 50 C50 50, 50 100, 50 100 C50 50, 0 50, 0 50 C50 50, 50 0, 50 0"
                fill="currentColor" />
        </svg>
        <!-- Flower pattern bottom left -->
        <svg class="absolute bottom-0 left-0 text-green-200/40 w-64 h-64 transform -rotate-90" viewBox="0 0 100 100">
            <circle cx="50" cy="50" r="10" fill="currentColor" />
            <path d="M50 0 C50 30, 70 50, 100 50 C70 50, 50 70, 50 100 C50 70, 30 50, 0 50 C30 50, 50 30, 50 0"
                fill="currentColor" />
        </svg>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Enhanced Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-center mb-16 space-y-4 sm:space-y-0">
            <div class="relative">
                <h2 class="text-4xl font-serif font-bold text-green-800 relative inline-block">
                    Kegiatan
                    <span class="absolute -bottom-3 left-0 w-full h-1 bg-green-500 rounded-full"></span>
                </h2>
                <div class="absolute -left-6 -top-6 text-green-200/50">
                    <svg class="w-12 h-12" viewBox="0 0 24 24" fill="none">
                        <path d="M12 3L14.5 8.5L20 9.5L16 14L17 20L12 17L7 20L8 14L4 9.5L9.5 8.5L12 3Z"
                            fill="currentColor" />
                    </svg>
                </div>
            </div>
            <a href="/kegiatan"
                class="group px-6 py-3 bg-green-600 hover:bg-green-700 rounded-full text-white font-medium flex items-center space-x-2 transform transition duration-300 hover:scale-105 shadow-lg hover:shadow-green-500/30">
                <span>Lihat Semua Kegiatan</span>
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 transform group-hover:translate-x-1 transition-transform duration-300" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </a>
        </div>

        <!-- Enhanced Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Featured Post with Natural Styling -->
            <div class="lg:col-span-2 group">
                <div
                    class="bg-white rounded-3xl shadow-xl overflow-hidden transform transition duration-300 hover:scale-[1.02] hover:shadow-2xl">
                    <div class="relative overflow-hidden h-96">
                        <img src="{{ asset('assets/images/' . $posts[0]['image']) }}" alt="{{ $posts[0]['title'] }}"
                            class="object-cover w-full h-full transform group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-8">
                            <div class="mb-4">
                                <span class="px-4 py-2 bg-green-500 text-white text-sm font-medium rounded-full">
                                    {{ \Carbon\Carbon::parse($posts[0]['date'])->format('d M Y') }}
                                </span>
                            </div>
                            <h3 class="text-3xl font-serif font-bold text-white mb-4">{{ $posts[0]['title'] }}</h3>
                            <p class="text-gray-200 font-sans line-clamp-2">{{ $posts[0]['description'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Posts with Natural Elements -->
            <div class="space-y-6">
                @foreach ($posts as $key => $post)
                    @if ($key > 0 && $key <= 3)
                        <div
                            class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300 transform hover:scale-[1.02]">
                            <div class="flex items-center space-x-4 p-4">
                                <div class="flex-shrink-0 w-32 h-32 rounded-xl overflow-hidden">
                                    <img src="{{ asset('assets/images/' . $post['image']) }}" alt="{{ $post['title'] }}"
                                        class="object-cover w-full h-full transform group-hover:scale-110 transition-transform duration-500">
                                </div>
                                <div class="flex-grow">
                                    <div class="mb-2">
                                        <span
                                            class="text-xs font-medium text-green-600 bg-green-100 px-3 py-1 rounded-full">
                                            {{ \Carbon\Carbon::parse($post['date'])->format('d M Y') }}
                                        </span>
                                    </div>
                                    <h4
                                        class="text-lg font-serif font-bold text-green-900 group-hover:text-green-700 transition-colors duration-300 mb-2">
                                        {{ $post['title'] }}
                                    </h4>
                                    <p class="text-gray-600 font-sans text-sm line-clamp-2">
                                        {{ $post['description'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
