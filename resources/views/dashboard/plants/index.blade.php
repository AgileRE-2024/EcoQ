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
                                <span class="ml-2 text-green-800">Plants</span>
                            </li>
                        </ol>
                    </nav>

                    <!-- Header Content -->
                    <div class="flex flex-col space-y-8">
                        <!-- Title Section -->
                        <div>
                            <h1 class="text-4xl font-bold text-green-800 tracking-tight">Plant Collection</h1>
                            <p class="mt-2 text-base text-green-600">Nurture and manage your botanical treasures</p>
                        </div>

                        <!-- Action Section -->
                        <div class="flex flex-col lg:flex-row gap-6">
                            <!-- Search Bar -->
                            <form action="{{ route('plants.index') }}" method="GET" class="flex-1 min-w-0">
                                <div class="relative flex max-w-2xl">
                                    <input type="text" name="search"
                                        placeholder="Search plants by name, category, or status..."
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
                                    <a href="{{ route('plants.create') }}"
                                        class="inline-flex items-center px-4 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-lg transition-all duration-150 shadow hover:shadow-md">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        Add New Plant
                                    </a>
                                @endif
                            </div>
                        </div>

                        <!-- Filter Section -->
                        <div id="filter-options" class="hidden pt-4 border-t border-green-100">
                            <form action="{{ route('plants.index') }}" method="GET"
                                class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                                <div class="flex flex-col">
                                    <label for="category" class="text-sm font-medium text-green-700 mb-2">Category</label>
                                    <select name="category" id="category"
                                        class="px-4 py-2 rounded-lg border border-green-300 focus:ring-2 focus:ring-green-500 focus:border-green-500 bg-white">
                                        <option value="">All Categories</option>
                                        <option value="flowers">Flowers</option>
                                        <option value="trees">Trees</option>
                                        <option value="shrubs">Shrubs</option>
                                    </select>
                                </div>

                                <div class="flex flex-col">
                                    <label for="status" class="text-sm font-medium text-green-700 mb-2">Status</label>
                                    <select name="status" id="status"
                                        class="px-4 py-2 rounded-lg border border-green-300 focus:ring-2 focus:ring-green-500 focus:border-green-500 bg-white">
                                        <option value="">All Status</option>
                                        <option value="healthy">Healthy</option>
                                        <option value="needs_attention">Needs Attention</option>
                                        <option value="critical">Critical</option>
                                    </select>
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
                @if ($plants->count() > 0)
                    <div class="min-w-full overflow-x-auto">
                        <table class="min-w-full divide-y divide-green-200">
                            <thead class="bg-green-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-green-700 uppercase tracking-wider w-24">
                                        Plant Image
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-green-700 uppercase tracking-wider">
                                        Name
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
                                        Habitat
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-green-700 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-green-200">
                                @foreach ($plants as $plant)
                                    <tr class="hover:bg-green-50 transition-colors duration-200 group">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div
                                                class="flex-shrink-0 h-20 w-20 relative group-hover:scale-105 transform transition-transform duration-300 ease-in-out">
                                                <img class="h-20 w-20 rounded-lg object-cover shadow-sm"
                                                    src="{{ $plant->image ? asset('storage/images/plants/' . $plant->image) : asset('assets/images/plant.jpeg') }}"
                                                    alt="{{ $plant->name }}">
                                                <div
                                                    class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 rounded-lg transition-all duration-300">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div
                                                class="text-sm font-medium text-green-900 group-hover:text-green-700 transition-colors">
                                                {{ $plant->name }}
                                            </div>
                                            <div class="text-xs text-green-600">
                                                {{ $plant->scientific_name }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-700 max-w-xs truncate">
                                                {{ Str::limit($plant->description, 100, '...') }}
                                            </div>
                                        </td>
                                        @if (Auth::user()->role == 'admin')
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    {{ $plant->garden->name }}
                                                </div>
                                            </td>
                                        @endif
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $plant->habitat == 'Rainforest'
                                        ? 'bg-green-100 text-green-800'
                                        : ($plant->habitat == 'Desert'
                                            ? 'bg-yellow-100 text-yellow-800'
                                            : ($plant->habitat == 'Tundra'
                                                ? 'bg-blue-100 text-blue-800'
                                                : 'bg-gray-100 text-gray-800')) }}
                                    ">
                                                {{ $plant->habitat }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex items-center justify-center space-x-3">
                                                <a href="{{ route('plants.show', $plant->id) }}"
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
                                                    <a href="{{ route('plants.edit', $plant->id) }}"
                                                        class="text-yellow-600 hover:text-yellow-900 transition-colors duration-150 hover:scale-110 transform">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                        </svg>
                                                    </a>
                                                    <form action="{{ route('plants.destroy', $plant->id) }}"
                                                        method="POST" class="inline-block"
                                                        onsubmit="return confirm('Are you sure you want to remove this plant from your collection?');">
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
                            Showing {{ $plants->firstItem() }} to {{ $plants->lastItem() }} of {{ $plants->total() }}
                            plants
                        </div>
                        <div>
                            {{ $plants->links('vendor.pagination.tailwind') }}
                        </div>
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="flex flex-col items-center justify-center py-16 px-6 text-center">
                        <svg class="w-24 h-24 text-green-300 mb-6" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.946 7.946 0 01-2.343 5.657z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" />
                        </svg>
                        <h2 class="text-2xl font-bold text-green-800 mb-4">No Plants Found</h2>
                        <p class="text-green-600 mb-6">Your plant collection is currently empty. Start by adding your first
                            plant!</p>
                        <a href="{{ route('plants.create') }}"
                            class="px-6 py-3 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors duration-150 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Add New Plant
                        </a>
                    </div>
                @endif
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $plants->links() }}
            </div>
        </div>
    </div>

    <!-- Floating Action Button for Mobile -->
    <div class="md:hidden fixed bottom-6 right-6">
        <a href="{{ route('plants.create') }}"
            class="flex items-center justify-center w-14 h-14 rounded-full bg-green-600 text-white shadow-lg hover:bg-green-700 transition-colors duration-300">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
        </a>
    </div>
@endsection

@push('styles')
    <style>
        /* Custom styles for a more natural feel */
        .bg-gradient-to-br {
            background-image: linear-gradient(to bottom right, var(--tw-gradient-stops));
        }

        .from-green-50 {
            --tw-gradient-from: #f0fdf4;
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgb(240 253 244 / 0));
        }

        .to-emerald-100 {
            --tw-gradient-to: #d1fae5;
        }

        /* Add a subtle texture to the background */
        .bg-gradient-to-br::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='4' height='4' viewBox='0 0 4 4'%3E%3Cpath fill='%239C92AC' fill-opacity='0.1' d='M1 3h1v1H1V3zm2-2h1v1H3V1z'%3E%3C/path%3E%3C/svg%3E");
        }
    </style>
@endpush

@push('scripts')
    <script>
        function toggleFilter() {
            const filterOptions = document.getElementById('filter-options');
            filterOptions.classList.toggle('hidden');
        }
    </script>
@endpush
