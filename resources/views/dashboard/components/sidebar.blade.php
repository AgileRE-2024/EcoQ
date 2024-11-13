<div
    class="bg-white w-64 h-screen shadow-md fixed top-0 left-0 transform transition-transform duration-300 ease-in-out lg:relative lg:transform-none">
    <!-- Logo -->
    <div class="flex items-center justify-center py-6 border-b">
        <a href="{{ route('dashboard') }}" class="font-bold text-xl text-gray-800 hover:text-green-600">
            Eco Q
        </a>
    </div>

    <!-- Navigation Links -->
    <nav class="mt-6 space-y-2">
        <!-- Events link -->
        <a href="{{ route('events.index') }}"
            class="flex items-center px-4 py-2 {{ request()->routeIs('events.index') ? 'bg-green-600 text-white' : 'text-gray-700' }} hover:bg-green-600 hover:text-white rounded-lg transition-colors duration-200">
            <i class="fas fa-calendar-alt mr-3"></i>
            <span>Events</span>
        </a>

        <!-- Plants link -->
        <a href="{{ route('plants.index') }}"
            class="flex items-center px-4 py-2 {{ request()->routeIs('plants.index') ? 'bg-green-600 text-white' : 'text-gray-700' }} hover:bg-green-600 hover:text-white rounded-lg transition-colors duration-200">
            <i class="fas fa-leaf mr-3"></i>
            <span>Plants</span>
        </a>

        <!-- Profile link -->
        <a href="{{ route('profile.index') }}"
            class="flex items-center px-4 py-2 {{ request()->routeIs('profile.index') ? 'bg-green-600 text-white' : 'text-gray-700' }} hover:bg-green-600 hover:text-white rounded-lg transition-colors duration-200">
            <i class="fas fa-user mr-3"></i>
            <span>Profile</span>
        </a>

        <!-- Garden link (only for admin) -->
        @if (auth()->user()->role === 'admin')
            <a href="{{ route('gardens.index') }}"
                class="flex items-center px-4 py-2 {{ request()->routeIs('garden.index') ? 'bg-green-600 text-white' : 'text-gray-700' }} hover:bg-green-600 hover:text-white rounded-lg transition-colors duration-200">
                <i class="fas fa-seedling mr-3"></i>
                <span>Garden</span>
            </a>
        @endif
    </nav>

    <!-- Logout Button -->
    <div class="absolute bottom-0 left-0 w-full p-4">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="w-full flex items-center justify-center px-4 py-2 text-gray-700 hover:bg-red-600 hover:text-white rounded-lg transition-colors duration-200">
                <i class="fas fa-sign-out-alt mr-3"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</div>
