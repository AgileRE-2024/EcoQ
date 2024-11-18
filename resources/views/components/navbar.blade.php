<nav class="inline-flex fixed w-full items-center justify-between bg-gray-100 px-6 py-4 shadow z-50 ">
    <!-- Logo -->
    <div class="flex items-center space-x-4">
        <a href="/">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo EcoQ" class="h-8">
        </a>
        <!-- Search Bar -->
        <div class="relative">
            <input
                type="text"
                placeholder="Search..."
                class="w-64 px-4 py-2 bg-gray-300 text-gray-700 rounded-full focus:outline-none"
            />
            <div class="absolute top-1/2 right-4 transform -translate-y-1/2">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 text-white"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M11 4a7 7 0 100 14 7 7 0 000-14zM21 21l-4.35-4.35"
                    />
                </svg>
            </div>
        </div>
    </div>

    <!-- Navigation Links -->
    <div class="flex items-center space-x-6">
        <a href="/" class="text-sm font-semibold text-green-900 hover:font-bold transition">HOME</a>
        <a href="/katalog" class="text-sm font-semibold text-green-900 hover:font-bold transition">KATALOG</a>
        <a href="/kegiatan" class="text-sm font-semibold text-green-900 hover:font-bold transition">KEGIATAN</a>

        @if(Auth::check())
        <!-- Menu Dashboard dan Logout -->
        <a href="/dashboard" class="text-sm font-semibold text-green-900 hover:font-bold transition">DASHBOARD</a>
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button
                type="submit"
                class="px-4 py-2 text-sm font-semibold text-red-900 border border-red-900 rounded hover:bg-red-900 hover:text-white hover:border-red-900 transition"
            >
                LOGOUT
            </button>
        </form>
        @else
        <!-- Menu Login -->
        <a
            href="/login"
            class="px-4 py-2 text-sm font-semibold text-green-900 border border-green-900 rounded hover:bg-green-900 hover:text-white hover:border-green-900 transition"
        >
            LOGIN
        </a>
        @endif
    </div>
</nav>
