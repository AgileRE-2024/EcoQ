<nav
    class="fixed w-full bg-gradient-to-r from-green-50 via-green-100 to-green-50 px-6 py-4 shadow-lg z-50 border-b border-green-200 backdrop-blur-sm">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <!-- Logo Section -->
        <div class="flex items-center space-x-8">
            <a href="/" class="flex items-center space-x-3 group">
                <div class="relative">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo EcoQ"
                        class="h-12 w-auto transform group-hover:scale-110 transition-all duration-500 ease-out">
                    <div
                        class="absolute -inset-1 bg-green-100 rounded-full opacity-0 group-hover:opacity-30 transition-opacity duration-500 blur">
                    </div>
                </div>
                <span
                    class="text-2xl font-serif font-semibold bg-gradient-to-r from-green-800 to-green-600 bg-clip-text text-transparent group-hover:from-green-600 group-hover:to-green-400 transition-all duration-500">
                    EcoGarden
                </span>
            </a>

            <!-- Enhanced Search Bar -->
            <div class="relative hidden sm:block group">
                <input type="text" placeholder="Cari tanaman..."
                    class="w-64 px-4 py-2.5 pl-11 rounded-full 
                           bg-white/80 backdrop-blur-md
                           border-2 border-green-100 
                           focus:border-green-300 focus:outline-none focus:ring-2 focus:ring-green-200 
                           placeholder-green-400
                           text-green-800 shadow-inner
                           transition-all duration-500 ease-out
                           group-hover:shadow-md
                           focus:w-80" />
                <div
                    class="absolute left-3.5 top-1/2 transform -translate-y-1/2 transition-transform duration-300 group-hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Navigation Links -->
        <div class="hidden md:flex items-center space-x-8">
            <!-- Navigation Items -->
            <a href="{{ route('welcome') }}" class="nav-item group">
                <div class="flex items-center space-x-2 py-2">
                    <svg class="w-4 h-4 text-green-600 group-hover:scale-110 transition-transform duration-300"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="font-medium tracking-wide text-green-800 group-hover:text-green-600">Home</span>
                </div>
                <div class="h-0.5 w-0 group-hover:w-full bg-green-500 transition-all duration-300 ease-out"></div>
            </a>

            <a href="{{ route('plants') }}" class="nav-item group">
                <div class="flex items-center space-x-2 py-2">
                    <svg class="w-4 h-4 text-green-600 group-hover:scale-110 transition-transform duration-300"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span class="font-medium tracking-wide text-green-800 group-hover:text-green-600">Katalog</span>
                </div>
                <div class="h-0.5 w-0 group-hover:w-full bg-green-500 transition-all duration-300 ease-out"></div>
            </a>

            <a href="{{ route('events') }}" class="nav-item group">
                <div class="flex items-center space-x-2 py-2">
                    <svg class="w-4 h-4 text-green-600 group-hover:scale-110 transition-transform duration-300"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span class="font-medium tracking-wide text-green-800 group-hover:text-green-600">Event</span>
                </div>
                <div class="h-0.5 w-0 group-hover:w-full bg-green-500 transition-all duration-300 ease-out"></div>
            </a>
            <a href="{{ route('indexGardens') }}" class="nav-item group">
                <div class="flex items-center space-x-2 py-2">
                    <svg class="w-4 h-4 text-green-600 group-hover:scale-110 transition-transform duration-300"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span class="font-medium tracking-wide text-green-800 group-hover:text-green-600">Gardens</span>
                </div>
                <div class="h-0.5 w-0 group-hover:w-full bg-green-500 transition-all duration-300 ease-out"></div>
            </a>

            <!-- Auth Buttons -->
            @if (Auth::check())
                <a href="/dashboard" class="nav-item group">
                    <div class="flex items-center space-x-2 py-2">
                        <svg class="w-4 h-4 text-green-600 group-hover:scale-110 transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span
                            class="font-medium tracking-wide text-green-800 group-hover:text-green-600">Dashboard</span>
                    </div>
                    <div class="h-0.5 w-0 group-hover:w-full bg-green-500 transition-all duration-300 ease-out"></div>
                </a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit"
                        class="flex items-center space-x-2 px-5 py-2.5 rounded-full 
                               text-red-600 hover:text-white 
                               border-2 border-red-200 hover:border-red-500
                               hover:bg-red-500 
                               transition-all duration-300 
                               focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-50
                               transform hover:scale-105">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span class="font-medium">Logout</span>
                    </button>
                </form>
            @else
                <a href="/login"
                    class="flex items-center space-x-2 px-5 py-2.5 rounded-full 
                           text-green-600 hover:text-white 
                           border-2 border-green-200 hover:border-green-500
                           hover:bg-green-500 
                           transition-all duration-300 
                           focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50
                           transform hover:scale-105">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    <span class="font-medium">Login</span>
                </a>
            @endif
        </div>

        <!-- Mobile Menu Button -->
        <div class="md:hidden">
            <button id="mobile-menu-button"
                class="p-2 rounded-lg text-green-800 hover:text-green-600 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-200 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Enhanced Mobile Menu -->
    <div id="mobile-menu"
        class="hidden md:hidden mt-4 p-4 bg-white/90 backdrop-blur-lg rounded-xl shadow-xl border border-green-100 mx-2">
        <div class="flex flex-col space-y-3">
            <a href="{{ route('welcome') }}" class="mobile-link">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span>Home</span>
            </a>
            <a href="{{ route('plants') }}" class="mobile-link">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <span>Katalog</span>
            </a>
            <a href="{{ route('events') }}" class="mobile-link">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span>Event</span>
            </a>
            <a href="{{ route('indexGardens') }}" class="mobile-link">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <span>Gardens</span>
            </a>

            @if (Auth::check())
                <a href="/dashboard" class="mobile-link">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Dashboard</span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="mobile-link text-red-600 hover:bg-red-50 w-full">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            @else
                <a href="/login" class="mobile-link text-green-600 hover:bg-green-50 font-semibold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    <span>Login</span>
                </a>
            @endif
        </div>

        <!-- Mobile Search -->
        <div class="mt-4 relative">
            <input type="text" placeholder="Cari tanaman..."
                class="w-full px-4 py-3 pl-11 rounded-xl
                       bg-white/80 backdrop-blur-sm
                       border-2 border-green-100 
                       focus:border-green-300 focus:outline-none focus:ring-2 focus:ring-green-200 
                       placeholder-green-400
                       text-green-800 shadow-inner
                       transition-all duration-300" />
            <div class="absolute left-3.5 top-1/2 transform -translate-y-1/2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
    </div>
</nav>

<style>
    /* Enhanced Animations */
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

    @keyframes scaleIn {
        from {
            transform: scale(0.95);
            opacity: 0;
        }

        to {
            transform: scale(1);
            opacity: 1;
        }
    }

    /* Mobile Menu Animation */
    #mobile-menu.show {
        animation: scaleIn 0.3s ease-out forwards;
    }

    /* Enhanced Navigation Links */
    .nav-item {
        position: relative;
        overflow: hidden;
    }

    .nav-item::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: currentColor;
        transform: scaleX(0);
        transform-origin: right;
        transition: transform 0.3s ease;
    }

    .nav-item:hover::after {
        transform: scaleX(1);
        transform-origin: left;
    }

    /* Mobile Navigation Links */
    .mobile-link {
        @apply flex items-center space-x-3 px-4 py-3 rounded-xl text-green-800 hover:bg-green-50 transition-all duration-300 ease-in-out;
    }

    .mobile-link:active {
        @apply transform scale-95;
    }

    /* Hover Effects */
    .hover-scale {
        @apply transition-transform duration-300 hover:scale-105;
    }

    .hover-glow:hover {
        box-shadow: 0 0 15px rgba(45, 106, 79, 0.2);
    }

    /* Glass Effect for Search */
    .glass-effect {
        @apply bg-white/80 backdrop-blur-sm;
    }
</style>

<script>
    // Enhanced Mobile Menu Toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        if (!mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.add('show');
        }
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', (event) => {
        if (!mobileMenuButton.contains(event.target) &&
            !mobileMenu.contains(event.target) &&
            !mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.add('hidden');
            mobileMenu.classList.remove('show');
        }
    });

    // Smooth scroll for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
