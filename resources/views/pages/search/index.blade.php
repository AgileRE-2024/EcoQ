@extends('layouts.app')

@section('content')
    <div
        class="min-h-screen bg-gradient-to-br from-green-50 via-emerald-50 to-teal-100 px-4 md:px-6 py-24 flex flex-col md:flex-row gap-6">
        <!-- Left Sidebar (Filters) -->
        <aside
            class="w-full h-full md:w-1/4 bg-white backdrop-blur-lg bg-opacity-90 shadow-xl rounded-2xl p-6 md:sticky md:top-6">
            <header class="mb-8">
                <h1 class="text-2xl font-bold text-green-800 border-b-2 border-green-100 pb-2">Filter Plants</h1>
                <p class="mt-2 text-sm text-green-600">Customize your search results</p>
            </header>

            <form id="search-form" action="{{ route('search') }}" method="GET" class="space-y-8">
                <input type="text" name="keyword" id="keyword" value="{{ request('keyword') }}"
                    placeholder="Search plants..."
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent">

                <div>
                    <label class="block text-sm font-medium text-green-700 mb-3">Plant Tags</label>
                    <div class="space-y-3 max-h-48 overflow-y-auto pr-2 rounded-lg">
                        @foreach ($tags as $tag)
                            <label class="flex items-center group cursor-pointer">
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                    {{ in_array($tag->id, request('tags', [])) ? 'checked' : '' }}
                                    class="form-checkbox h-5 w-5 text-green-600 rounded border-gray-300 focus:ring-green-500 filter-checkbox tags-checkbox">
                                <span
                                    class="ml-3 text-sm text-gray-700 group-hover:text-green-600 transition-colors">{{ $tag->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <select name="sort" id="sort"
                    class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First</option>
                    <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name: A to Z</option>
                </select>
            </form>

            <button id="reset-filters"
                class="mt-4 w-full py-2 px-4 bg-gray-50 hover:bg-gray-100 text-gray-700 rounded-lg transition-colors duration-200 flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
                Reset Filters
            </button>
        </aside>

        <!-- Right Content (Search Results) -->
        <main class="flex-1">
            <div class="mb-6 flex items-center justify-between">
                <h2 class="text-xl font-semibold text-green-800">
                    <span id="plants-count">{{ $plants->count() }}</span> Plants Found
                </h2>
            </div>
            <div id="plant-container">
                @include('partials.plants', ['plants' => $plants])
            </div>

            <!-- Pagination -->
            <div id="pagination" class="mt-12 flex justify-center">
                {{ $plants->links() }}
            </div>
        </main>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const form = document.getElementById('search-form');
                const checkboxes = document.querySelectorAll('.filter-checkbox');
                const keywordInput = document.getElementById('keyword');
                const sortSelect = document.getElementById('sort');
                const resetButton = document.getElementById('reset-filters');
                let debounceTimer;

                function updatePlants() {
                    clearTimeout(debounceTimer);
                    debounceTimer = setTimeout(() => {
                        const formData = new FormData(form);
                        const searchParams = new URLSearchParams(formData);

                        fetch(`{{ route('search') }}?${searchParams.toString()}`, {
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest'
                                }
                            })
                            .then(response => response.text())
                            .then(data => {
                                document.getElementById('plant-container').innerHTML = data;
                                updatePlantsCount();
                                updateURL(searchParams);
                            })
                            .catch(error => {
                                console.error('Error fetching data:', error);
                            });
                    }, 300);
                }

                function updatePlantsCount() {
                    const countElement = document.getElementById('plants-count');
                    const plantItems = document.querySelectorAll('#plant-container > div');
                    countElement.textContent = plantItems.length;
                }

                function updateURL(searchParams) {
                    const newURL = `${window.location.pathname}?${searchParams.toString()}`;
                    history.pushState(null, '', newURL);
                }

                checkboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', updatePlants);
                });

                keywordInput.addEventListener('input', updatePlants);
                sortSelect.addEventListener('change', updatePlants);

                resetButton.addEventListener('click', function() {
                    form.reset();
                    updatePlants();
                });

                // Handle pagination clicks
                document.addEventListener('click', function(e) {
                    if (e.target.matches('.pagination a')) {
                        e.preventDefault();
                        fetch(e.target.href, {
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest'
                                }
                            })
                            .then(response => response.text())
                            .then(data => {
                                document.getElementById('plant-container').innerHTML = data;
                                updatePlantsCount();
                                updateURL(new URLSearchParams(e.target.href.split('?')[1]));
                            })
                            .catch(error => {
                                console.error('Error fetching data:', error);
                            });
                    }
                });
            });
        </script>
    @endpush

    @push('styles')
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap');

            body {
                font-family: 'Poppins', sans-serif;
            }

            h1,
            h2,
            h3 {
                font-family: 'Playfair Display', serif;
            }

            .line-clamp-2 {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            /* Custom Scrollbar */
            .overflow-y-auto {
                scrollbar-width: thin;
                scrollbar-color: #9CA3AF #F3F4F6;
            }

            .overflow-y-auto::-webkit-scrollbar {
                width: 6px;
            }

            .overflow-y-auto::-webkit-scrollbar-track {
                background: #F3F4F6;
                border-radius: 8px;
            }

            .overflow-y-auto::-webkit-scrollbar-thumb {
                background-color: #9CA3AF;
                border-radius: 8px;
            }

            .overflow-y-auto::-webkit-scrollbar-thumb:hover {
                background-color: #6B7280;
            }

            /* Loading Animation */
            @keyframes spin {
                from {
                    transform: rotate(0deg);
                }

                to {
                    transform: rotate(360deg);
                }
            }

            .animate-spin {
                animation: spin 1s linear infinite;
            }
        </style>
        </style>
    @endpush
@endsection
