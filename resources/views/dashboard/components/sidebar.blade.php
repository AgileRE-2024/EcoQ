<div
    class="bg-gradient-to-b from-white to-green-50 w-72 h-screen shadow-xl fixed top-0 left-0 
            transform transition-transform duration-300 ease-in-out 
            lg:relative lg:transform-none border-r border-green-100">
    <!-- Logo Section with Elegant Design -->
    <div class="flex items-center justify-center py-6 border-b border-green-100">
        <a href="{{ route('dashboard') }}"
            class="text-2xl font-bold text-green-800 tracking-tight 
                  hover:text-green-600 transition-colors duration-300 
                  flex items-center space-x-2">
            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
            </svg>
            <span>Eco Q</span>
        </a>
    </div>

    <!-- Navigation Links with Enhanced Interactivity -->
    <nav class="mt-6 space-y-1 px-4">
        @php
            $navLinks = [
                ['route' => 'events.index', 'icon' => 'calendar-alt', 'label' => 'Events'],
                ['route' => 'plants.index', 'icon' => 'leaf', 'label' => 'Plants'],
                ['route' => 'profile.index', 'icon' => 'user', 'label' => 'Profile'],
            ];
        @endphp

        @foreach ($navLinks as $link)
            <a href="{{ route($link['route']) }}"
                class="group flex items-center px-4 py-2.5 
                      {{ request()->routeIs($link['route']) ? 'bg-green-600 text-white' : 'text-gray-700' }} 
                      hover:bg-green-600 hover:text-white 
                      rounded-lg transition-all duration-300 
                      transform hover:-translate-y-0.5 hover:shadow-md">
                <i
                    class="fas fa-{{ $link['icon'] }} mr-3 
                   group-hover:rotate-6 transition-transform duration-300"></i>
                <span class="font-medium">{{ $link['label'] }}</span>
            </a>
        @endforeach

        <!-- Admin Garden Link with Conditional Rendering -->
        @if (auth()->user()->role === 'admin')
            <a href="{{ route('gardens.index') }}"
                class="group flex items-center px-4 py-2.5 
                      {{ request()->routeIs('gardens.index') ? 'bg-green-600 text-white' : 'text-gray-700' }} 
                      hover:bg-green-600 hover:text-white 
                      rounded-lg transition-all duration-300 
                      transform hover:-translate-y-0.5 hover:shadow-md">
                <i
                    class="fas fa-seedling mr-3 
                   group-hover:rotate-6 transition-transform duration-300"></i>
                <span class="font-medium">Garden</span>
            </a>
        @endif
    </nav>

    <!-- Logout Button with Enhanced Design -->
    <div class="absolute bottom-0 left-0 w-full p-4">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="w-full flex items-center justify-center px-4 py-2.5 
                           text-red-600 hover:bg-red-600 hover:text-white 
                           border border-red-200 rounded-lg 
                           transition-all duration-300 
                           transform hover:-translate-y-0.5 hover:shadow-md 
                           group">
                <i
                    class="fas fa-sign-out-alt mr-3 
                   group-hover:rotate-6 transition-transform duration-300"></i>
                <span class="font-medium">Logout</span>
            </button>
        </form>
    </div>
</div>
