<nav class="fixed w-full bg-gradient-to-r from-green-50 to-green-100 px-6 py-3 shadow-md z-50 border-b border-green-200">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <!-- Logo Section -->
        <div class="flex items-center space-x-6">
            <a href="/" class="flex items-center space-x-2 group">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo EcoQ"
                    class="h-10 w-auto transform group-hover:scale-105 transition-transform duration-300">
                <span
                    class="text-xl font-serif font-semibold text-green-800 group-hover:text-green-600 transition-colors duration-300">EcoGarden</span>
            </a>

            <!-- Search Bar with Natural Style -->
            <div class="relative hidden sm:block">
                <input type="text" placeholder="Cari tanaman..."
                    class="w-64 px-4 py-2 pl-10 rounded-full 
                           bg-white/70 backdrop-blur-sm
                           border border-green-200 
                           focus:outline-none focus:ring-2 focus:ring-green-300 
                           placeholder-green-600/50
                           text-green-800 shadow-inner
                           transition-all duration-300 ease-in-out
                           focus:w-72" />
                <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="hidden md:flex items-center space-x-8">
            @foreach ([
        'HOME' => ['/', 'home'],
        'KATALOG' => ['/katalog', 'book-open'],
        'KEGIATAN' => ['/kegiatan', 'calendar'],
    ] as $name => [$url, $icon])
                <a href="{{ $url }}"
                    class="group relative flex items-center space-x-2 py-2 text-gray-700 hover:text-green-600 transition-colors duration-200">
                    <svg class="w-4 h-4 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        @if ($icon === 'home')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        @elseif($icon === 'book-open')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        @elseif($icon === 'calendar')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        @endif
                    </svg>
                    <span class="font-medium tracking-wide">{{ $name }}</span>
                    <span
                        class="absolute bottom-0 left-0 w-full h-0.5 bg-green-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                </a>
            @endforeach

            @if (Auth::check())
                <a href="/dashboard"
                    class="group relative flex items-center space-x-2 py-2 text-gray-700 hover:text-green-600 transition-colors duration-200">
                    <svg class="w-4 h-4 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="font-medium tracking-wide">DASHBOARD</span>
                    <span
                        class="absolute bottom-0 left-0 w-full h-0.5 bg-green-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                </a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit"
                        class="flex items-center space-x-2 px-4 py-2 rounded-full text-red-600 hover:text-white border border-red-200 hover:bg-red-500 hover:border-transparent transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-50">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span class="font-medium">LOGOUT</span>
                    </button>
                </form>
            @else
                <a href="/login"
                    class="flex items-center space-x-2 px-4 py-2 rounded-full text-green-600 hover:text-white border border-green-200 hover:bg-green-500 hover:border-transparent transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    <span class="font-medium">LOGIN</span>
                </a>
            @endif
        </div>


        <!-- Mobile Menu Button -->
        <div class="md:hidden">
            <button id="mobile-menu-button" class="text-green-800 hover:text-green-600 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden mt-2 p-4 bg-green-50 rounded-lg shadow-lg">
        <div class="flex flex-col space-y-2">
            @foreach (['HOME' => '/', 'KATALOG' => '/katalog', 'KEGIATAN' => '/kegiatan'] as $name => $url)
                <a href="{{ $url }}" class="mobile-nav-link">
                    {{ $name }}
                </a>
            @endforeach

            @if (Auth::check())
                <a href="/dashboard" class="mobile-nav-link">DASHBOARD</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left mobile-nav-link text-red-700">
                        LOGOUT
                    </button>
                </form>
            @else
                <a href="/login" class="mobile-nav-link text-green-700 font-semibold">LOGIN</a>
            @endif
        </div>
        <div class="mt-4">
            <input type="text" placeholder="Cari tanaman..."
                class="w-full px-4 py-2 rounded-full 
                       bg-white/70 backdrop-blur-sm
                       border border-green-200 
                       focus:outline-none focus:ring-2 focus:ring-green-300 
                       placeholder-green-600/50
                       text-green-800 shadow-inner" />
        </div>
    </div>
</nav>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .nav-item-appear {
        animation: fadeIn 0.3s ease-out forwards;
    }

    .nav-link {
        @apply relative flex items-center space-x-1 text-sm font-medium text-green-800 hover:text-green-600 transition-colors duration-300;
    }

    .nav-link-text {
        @apply z-10;
    }

    .nav-link-underline {
        @apply absolute left-0 bottom-0 w-0 h-0.5 bg-green-500 transition-all duration-300 ease-out;
    }

    .nav-link:hover .nav-link-underline {
        @apply w-full;
    }

    .mobile-nav-link {
        @apply block py-2 px-4 text-green-800 hover:bg-green-100 rounded-md transition-colors duration-200;
    }

    /* Leaf animation */
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

    .floating-leaf {
        animation: float 5s ease-in-out infinite;
    }

    /* General Navigation Styles */
    .nav-link {
        position: relative;
        display: inline-block;
        padding: 0.5rem 1rem;
        font-weight: 500;
        text-transform: uppercase;
        color: #4a4a4a;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .nav-link:hover {
        color: #2d6a4f;
        /* Warna hijau lebih tua saat hover */
    }

    /* Underline Animation */
    .nav-link-underline {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: #2d6a4f;
        /* Warna underline hijau */
        transition: width 0.3s ease;
    }

    .nav-link:hover .nav-link-underline {
        width: 100%;
    }

    /* Button Styles */
    .nav-button {
        display: inline-block;
        padding: 0.5rem 1.25rem;
        font-size: 0.875rem;
        font-weight: 600;
        text-transform: uppercase;
        color: white;
        background: #2d6a4f;
        border: 2px solid transparent;
        border-radius: 999px;
        /* Membuat tombol bulat */
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .nav-button:hover {
        background: #95d5b2;
        color: #2d6a4f;
        border-color: #2d6a4f;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    /* Active State */
    .nav-link.active {
        color: #2d6a4f;
        font-weight: bold;
    }
</style>



<script>
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>
