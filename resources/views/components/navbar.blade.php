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

        <!-- Navigation Links with Natural Hover Effects -->
        <div class="hidden md:flex items-center space-x-6">
            @foreach (['HOME' => '/', 'KATALOG' => '/katalog', 'KEGIATAN' => '/kegiatan'] as $name => $url)
                <a href="{{ $url }}" class="nav-link group">
                    <span class="nav-link-text">{{ $name }}</span>
                    <span class="nav-link-underline"></span>
                </a>
            @endforeach

            @if (Auth::check())
                <a href="/dashboard" class="nav-link group">
                    <span class="nav-link-text">DASHBOARD</span>
                    <span class="nav-link-underline"></span>
                </a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-red-700 
                               bg-white/50 backdrop-blur-sm
                               border border-red-200 rounded-full
                               hover:bg-red-50 hover:border-red-300 
                               transition-all duration-300 ease-in-out
                               shadow-sm hover:shadow-md">
                        <span>LOGOUT</span>
                    </button>
                </form>
            @else
                <a href="/login"
                    class="px-4 py-2 text-sm font-medium text-green-700 
                           bg-white/50 backdrop-blur-sm
                           border border-green-200 rounded-full
                           hover:bg-green-50 hover:border-green-300 
                           transition-all duration-300 ease-in-out
                           shadow-sm hover:shadow-md">
                    <span>LOGIN</span>
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
</style>

<script>
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>
