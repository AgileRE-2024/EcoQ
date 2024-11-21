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
                                <span class="ml-2 text-green-800">Gardens</span>
                            </li>
                        </ol>
                    </nav>

                    <!-- Header Content -->
                    <div class="flex flex-col space-y-8">
                        <!-- Title Section -->
                        <div>
                            <h1 class="text-4xl font-bold text-green-800 tracking-tight">Gardens</h1>
                            <p class="mt-2 text-base text-green-600">Explore and manage gardens in the system</p>
                        </div>

                        <!-- Action Section -->
                        <div class="flex flex-col lg:flex-row gap-6">
                            <!-- Search Bar -->
                            <form action="{{ route('gardens.index') }}" method="GET" class="flex-1 min-w-0">
                                <div class="relative flex max-w-2xl">
                                    <input type="text" name="search"
                                        placeholder="Search gardens by name, location, or description..."
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

                                <a href="{{ route('gardens.create') }}"
                                    class="inline-flex items-center px-4 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-lg transition-all duration-150 shadow hover:shadow-md">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    Create New Garden
                                </a>
                            </div>
                        </div>

                        <!-- Filter Section -->
                        <div id="filterSection" class="hidden bg-green-50 p-4 rounded-lg">
                            <!-- Add filter options here -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gardens Table -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden mt-8">
                @if ($gardens->count() > 0)
                    <div class="min-w-full overflow-x-auto">
                        <table class="min-w-full divide-y divide-green-200">
                            <thead class="bg-green-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-green-700 uppercase tracking-wider w-24">
                                        Garden Image
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-green-700 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-green-700 uppercase tracking-wider">
                                        Location
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-green-700 uppercase tracking-wider">
                                        Description
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-green-700 uppercase tracking-wider">
                                        Opening Hours
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-green-700 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-green-200">
                                @foreach ($gardens as $garden)
                                    <tr class="hover:bg-green-50 transition-colors duration-200 group">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div
                                                class="flex-shrink-0 h-20 w-20 relative group-hover:scale-105 transform transition-transform duration-300 ease-in-out">
                                                <img class="h-20 w-20 rounded-lg object-cover shadow-sm"
                                                    src="{{ $garden->image ? asset('storage/images/gardens/' . $garden->image) : asset('assets/images/garden.jpg') }}"
                                                    alt="{{ $garden->name }}">
                                                <div
                                                    class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 rounded-lg transition-all duration-300">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div
                                                class="text-sm font-medium text-green-900 group-hover:text-green-700 transition-colors">
                                                {{ $garden->name }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-700">
                                                {{ $garden->location ?? '-' }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-700 max-w-xs truncate">
                                                {{ Str::limit($garden->description, 100, '...') }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-green-700">
                                                <div>{{ $garden->open_time }} - {{ $garden->close_time }}</div>
                                                <div class="text-xs text-gray-500 mt-1">
                                                    {{ $garden->phone_number }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex items-center justify-center space-x-3">
                                                <a href="{{ route('gardens.show', $garden->id) }}"
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
                                                @if (Auth::user()->role == 'admin' || Auth::user()->id == $garden->user_id)
                                                    <form action="{{ route('gardens.destroy', $garden->id) }}"
                                                        method="POST" class="inline-block"
                                                        onsubmit="return confirm('Are you sure you want to remove this garden?');">
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
                            Showing {{ $gardens->firstItem() }} to {{ $gardens->lastItem() }} of {{ $gardens->total() }}
                            gardens
                        </div>
                        <div>
                            {{ $gardens->links('vendor.pagination.tailwind') }}
                        </div>
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="flex flex-col items-center justify-center py-16 px-6 text-center">
                        <svg class="w-24 h-24 text-green-300 mb-6" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                        </svg>
                        <h2 class="text-2xl font-bold text-green-800 mb-4">No Gardens Found</h2>
                        <p class="text-green-600 mb-6">Your garden list is currently empty. Start by creating your first
                            garden!</p>
                        <a href="{{ route('gardens.create') }}"
                            class="px-6 py-3 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors duration-150 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Create New Garden
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Floating Action Button for Mobile -->
    <div class="md:hidden fixed bottom-6 right-6">
        <a href="{{ route('gardens.create') }}"
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
            const filterSection = document.getElementById('filterSection');
            filterSection.classList.toggle('hidden');
        }
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
