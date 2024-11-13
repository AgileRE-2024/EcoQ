<div
    class="bg-white w-64 h-screen shadow-md fixed top-0 left-0 transform transition-transform duration-300 ease-in-out lg:relative lg:transform-none">
    <div class="flex items-center justify-center py-6 border-b">
        <a href="{{ route('dashboard') }}" class="font-bold text-xl text-gray-800 hover:text-indigo-600">
            Dashboard
        </a>
    </div>
    <nav class="mt-6 space-y-2">
        <!-- Event link -->
        <a href="{{ route('events.index') }}"
            class="flex items-center px-4 py-2 text-gray-700 hover:bg-indigo-600 hover:text-white rounded-lg transition-colors duration-200">
            <i class="fas fa-calendar-alt mr-3"></i>
            <span>Events</span>
        </a>

        <!-- Plants link -->
        <a href="{{ route('plants.index') }}"
            class="flex items-center px-4 py-2 text-gray-700 hover:bg-indigo-600 hover:text-white rounded-lg transition-colors duration-200">
            <i class="fas fa-leaf mr-3"></i>
            <span>Plants</span>
        </a>

        <!-- Profile link -->
        <a href="{{ route('profile.index') }}"
            class="flex items-center px-4 py-2 text-gray-700 hover:bg-indigo-600 hover:text-white rounded-lg transition-colors duration-200">
            <i class="fas fa-user mr-3"></i>
            <span>Profile</span>
        </a>
    </nav>
</div>
