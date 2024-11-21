@extends('dashboard.layouts.template')

@section('content')
    <div class="bg-gradient-to-br from-green-50 to-emerald-100 flex-1 p-6 min-h-screen">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white rounded-xl shadow-sm p-8">
                <div class="max-w-7xl mx-auto">
                    <!-- Top Section with Breadcrumb -->
                    <nav class="mb-6" aria-label="Breadcrumb">
                        <ol class="flex items-center space-x-2 text-sm">
                            <li class="flex items-center">
                                <a href="{{ route('dashboard') }}"
                                    class="text-green-600 hover:text-green-800 flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    Dashboard
                                </a>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 5l7 7-7 7" />
                                </svg>
                                <span class="ml-2 text-green-800">Events</span>
                            </li>
                        </ol>
                    </nav>

                    <!-- Header Content -->
                    <div class="flex flex-col space-y-8">
                        <!-- Title Section -->
                        <div>
                            <h1 class="text-4xl font-bold text-green-800 tracking-tight">Event Calendar</h1>
                            <p class="mt-2 text-base text-green-600">Explore and manage upcoming garden events</p>
                        </div>

                        <!-- Action Section -->
                        <div class="flex flex-col lg:flex-row gap-6">
                            <!-- Search Bar -->
                            <form action="{{ route('events.index') }}" method="GET" class="flex-1 min-w-0">
                                <div class="relative flex max-w-2xl">
                                    <input type="text" name="search"
                                        placeholder="Search events by title, location, or date..."
                                        value="{{ request('search') }}"
                                        class="w-full px-4 py-3 rounded-l-lg border border-green-300 focus:ring-2 focus:ring-green-500 focus:border-green-500 placeholder-green-400 text-green-800">
                                    <button type="submit"
                                        class="px-6 bg-green-600 text-white rounded-r-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-150 flex items-center">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </button>
                                </div>
                            </form>

                            <!-- Action Buttons -->
                            <div class="flex items-center gap-4">
                                <button type="button" onclick="toggleFilter()"
                                    class="inline-flex items-center px-4 py-3 bg-yellow-500 hover:bg-yellow-600 text-white font-medium rounded-lg transition-all duration-150 shadow hover:shadow-md">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L13 12.414V19a1 1 0 01-.553.894l-4 2A1 1 0 017 21v-8.586L3.293 6.707A1 1 0 013 6V4z" />
                                    </svg>
                                    Filter
                                </button>

                                @if (Auth::user()->role == 'garden_owner')
                                    <a href="{{ route('events.create') }}"
                                        class="inline-flex items-center px-4 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-lg transition-all duration-150 shadow hover:shadow-md">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        Create New Event
                                    </a>
                                @endif
                            </div>
                        </div>

                        <!-- Filter Section -->
                        <div id="filter-options" class="hidden pt-4 border-t border-green-100">
                            <form action="{{ route('events.index') }}" method="GET"
                                class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                                @if (Auth::user()->role == 'admin')
                                    <div class="flex flex-col">
                                        <label for="garden" class="text-sm font-medium text-green-700 mb-2">Garden</label>
                                        <select name="garden" id="garden"
                                            class="px-4 py-2 rounded-lg border border-green-300 focus:ring-2 focus:ring-green-500 focus:border-green-500 bg-white">
                                            <option value="">All Gardens</option>
                                            @foreach ($gardens as $garden)
                                                <option value="{{ $garden->id }}">{{ $garden->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif

                                <div class="flex flex-col">
                                    <label for="date_range" class="text-sm font-medium text-green-700 mb-2">Date
                                        Range</label>
                                    <input type="text" name="date_range" id="date_range" placeholder="Select date range"
                                        class="px-4 py-2 rounded-lg border border-green-300 focus:ring-2 focus:ring-green-500 focus:border-green-500 bg-white">
                                </div>

                                <div class="md:col-span-3 lg:col-span-4 flex justify-end">
                                    <button type="submit"
                                        class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-150">
                                        Apply Filters
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                @if ($events->count() > 0)
                    <div class="min-w-full overflow-x-auto">
                        <table class="min-w-full divide-y divide-green-200">
                            <thead class="bg-green-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-green-700 uppercase tracking-wider w-24">
                                        Event Image
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-green-700 uppercase tracking-wider">
                                        Title
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-green-700 uppercase tracking-wider">
                                        Description
                                    </th>
                                    @if (Auth::user()->role == 'admin')
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-green-700 uppercase tracking-wider">
                                            Garden
                                        </th>
                                    @endif
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-green-700 uppercase tracking-wider">
                                        Date & Time
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-green-700 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-green-200">
                                @foreach ($events as $event)
                                    <tr class="hover:bg-green-50 transition-colors duration-200 group">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div
                                                class="flex-shrink-0 h-20 w-20 relative group-hover:scale-105 transform transition-transform duration-300 ease-in-out">
                                                <img class="h-20 w-20 rounded-lg object-cover shadow-sm"
                                                    src="{{ $event->image ? asset('storage/images/events/' . $event->image) : asset('assets/images/event-placeholder.jpeg') }}"
                                                    alt="{{ $event->title }}">
                                                <div
                                                    class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 rounded-lg transition-all duration-300">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div
                                                class="text-sm font-medium text-green-900 group-hover:text-green-700 transition-colors">
                                                {{ $event->title }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-700 max-w-xs truncate">
                                                {{ Str::limit($event->description, 100, '...') }}
                                            </div>
                                        </td>
                                        @if (Auth::user()->role == 'admin')
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    {{ $event->garden->name }}
                                                </div>
                                            </td>
                                        @endif
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-green-700">
                                                <div>{{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}</div>
                                                <div class="text-xs text-green-500">
                                                    {{ \Carbon\Carbon::parse($event->time)->format('h:i A') }}
                                                </div>
                                                <div class="text-xs text-gray-500 mt-1">
                                                    {{ $event->location }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex items-center justify-center space-x-3">
                                                <a href="{{ route('events.show', $event->id) }}"
                                                    class="text-emerald-600 hover:text-emerald-900 transition-colors duration-150 hover:scale-110 transform">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </a>
                                                @if (Auth::user()->role == 'garden_owner')
                                                    <a href="{{ route('events.edit', $event->id) }}"
                                                        class="text-yellow-600 hover:text-yellow-900 transition-colors duration-150 hover:scale-110 transform">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                        </svg>
                                                    </a>
                                                    <form action="{{ route('events.destroy', $event->id) }}"
                                                        method="POST" class="inline-block"
                                                        onsubmit="return confirm('Are you sure you want to remove this event?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-red-600 hover:text-red-900 transition-colors duration-150 hover:scale-110 transform">
                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="bg-green-50 px-6 py-4 flex items-center justify-between border-t border-green-200">
                        <div class="text-sm text-green-700">
                            Showing {{ $events->firstItem() }} to {{ $events->lastItem() }} of {{ $events->total() }}
                            events
                        </div>
                        <div>
                            {{ $events->links('vendor.pagination.tailwind') }}
                        </div>
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="flex flex-col items-center justify-center py-16 px-6 text-center">
                        <svg class="w-24 h-24 text-green-300 mb-6" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <h2 class="text-2xl font-bold text-green-800 mb-4">No Events Found</h2>
                        <p class="text-green-600 mb-6">Your event calendar is currently empty. Start by creating your first
                            event!</p>
                        <a href="{{ route('events.create') }}"
                            class="px-6 py-3 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors duration-150 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Create New Event
                        </a>
                    </div>
                @endif
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $events->links() }}
            </div>
        </div>
    </div>

    <!-- Floating Action Button for Mobile -->
    <div class="md:hidden fixed bottom-6 right-6">
        <a href="{{ route('events.create') }}"
            class="flex items-center justify-center w-14 h-14 rounded-full bg-green-600 text-white shadow-lg hover:bg-green-700 transition-colors duration-300">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
        </a>
    </div>
@endsection

@push('scripts')
    <script>
        function toggleFilter() {
            const filterOptions = document.getElementById('filter-options');
            filterOptions.classList.toggle('hidden');
        }

        // Optional: Add date range picker initialization
        document.addEventListener('DOMContentLoaded', function() {
            // You might want to include a date range picker library like Flatpickr
            // Example initialization (requires Flatpickr to be included)
            /*
            flatpickr("#date_range", {
                mode: "range",
                dateFormat: "Y-m-d",
                defaultDate: ["{{ now()->format('Y-m-d') }}", "{{ now()->addMonth()->format('Y-m-d') }}"]
            });
            */
        });
    </script>
@endpush

@push('styles')
    <style>
        @keyframes blob {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>
@endpush
