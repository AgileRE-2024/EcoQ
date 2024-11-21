<div x-data="{ open: false, taxonomyOpen: false }"
    class="fixed inset-y-0 left-0 z-50 w-72 bg-gradient-to-b from-white to-green-50 
            shadow-xl transform transition-transform duration-300 ease-in-out 
            lg:relative lg:translate-x-0
            {{ request()->routeIs('mobile-menu-open') ? 'translate-x-0' : '-translate-x-full' }}
            border-r border-green-100">

    <!-- Mobile Close Button -->
    <button @click="open = false" x-show="open"
        class="lg:hidden absolute top-4 right-4 z-50 text-gray-600 hover:text-gray-900">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <!-- Logo Section with Elegant Design -->
    <div class="flex items-center justify-center py-6 border-b border-green-100 relative">
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
                ['route' => 'events.*', 'icon' => 'calendar-alt', 'label' => 'Events'],
                ['route' => 'plants.*', 'icon' => 'leaf', 'label' => 'Plants'],
                ['route' => 'profile.*', 'icon' => 'user', 'label' => 'Profile'],
            ];
        @endphp

        @foreach ($navLinks as $link)
            <a href="{{ route(str_replace('.*', '.index', $link['route'])) }}"
                class="group flex items-center px-4 py-2.5 
              {{ request()->routeIs($link['route']) ? 'bg-green-600 text-white' : 'text-gray-700' }} 
              hover:bg-green-600 hover:text-white 
              rounded-lg transition-all duration-300 
              transform hover:-translate-y-0.5 hover:shadow-md 
              focus:outline-none focus:ring-2 focus:ring-green-300">
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
                      transform hover:-translate-y-0.5 hover:shadow-md 
                      focus:outline-none focus:ring-2 focus:ring-green-300">
                <i
                    class="fas fa-seedling mr-3 
                   group-hover:rotate-6 transition-transform duration-300"></i>
                <span class="font-medium">Garden</span>
            </a>
            <!-- Taxonomy Dropdown -->
            <div class="relative">
                <button @click="taxonomyOpen = !taxonomyOpen"
                    class="w-full flex items-center justify-between px-4 py-2.5 
                       text-gray-700 hover:bg-green-600 hover:text-white 
                       rounded-lg transition-all duration-300 
                       transform hover:-translate-y-0.5 hover:shadow-md 
                       focus:outline-none focus:ring-2 focus:ring-green-300">
                    <div class="flex items-center">
                        <i class="fas fa-dna mr-3 group-hover:rotate-6 transition-transform duration-300"></i>
                        <span class="font-medium">Taksonomi</span>
                    </div>
                    <svg x-show="!taxonomyOpen" class="w-4 h-4 transform transition-transform duration-300"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                    <svg x-show="taxonomyOpen" class="w-4 h-4 transform transition-transform duration-300"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                    </svg>
                </button>

                <!-- Taxonomy Submenu -->
                <div x-show="taxonomyOpen" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 transform translate-y-0"
                    x-transition:leave-end="opacity-0 transform -translate-y-2" class="pl-4 mt-2 space-y-1">
                    @php
                        $taxonomyLinks = [
                            ['route' => 'taxonomy.kingdom', 'icon' => 'layer-group', 'label' => 'Kingdom'],
                            ['route' => 'taxonomy.phylum', 'icon' => 'sitemap', 'label' => 'Phylum'],
                            ['route' => 'taxonomy.class', 'icon' => 'object-group', 'label' => 'Class'],
                            ['route' => 'taxonomy.order', 'icon' => 'sort-amount-up', 'label' => 'Order'],
                            ['route' => 'taxonomy.family', 'icon' => 'users', 'label' => 'Family'],
                            ['route' => 'taxonomy.genus', 'icon' => 'list', 'label' => 'Genus'],
                            ['route' => 'taxonomy.species', 'icon' => 'dna', 'label' => 'Species'],
                        ];
                    @endphp

                    @foreach ($taxonomyLinks as $link)
                        <a href="{{ route($link['route']) }}"
                            class="block pl-8 py-1.5 
                              {{ request()->routeIs($link['route']) ? 'bg-green-600 text-white' : 'text-gray-600' }} 
                              hover:bg-green-600 hover:text-white 
                              rounded-lg transition-all duration-300 
                              transform hover:-translate-x-1 
                              focus:outline-none focus:ring-2 focus:ring-green-300">
                            <div class="flex items-center">
                                <i
                                    class="fas fa-{{ $link['icon'] }} mr-3 
                            group-hover:rotate-6 transition-transform duration-300"></i>
                                <span class="font-medium text-sm">{{ $link['label'] }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
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
                           group focus:outline-none focus:ring-2 focus:ring-red-300">
                <i
                    class="fas fa-sign-out-alt mr-3 
                   group-hover:rotate-6 transition-transform duration-300"></i>
                <span class="font-medium">Logout</span>
            </button>
        </form>
    </div>
</div>
