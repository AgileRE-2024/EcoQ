<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-6">
    @foreach ($plants as $plant)
        <div
            class="group bg-white backdrop-blur-lg bg-opacity-90 rounded-xl overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="relative overflow-hidden">
                <img src="{{ $plant->image ? asset('storage/images/plants/' . $plant->image) : asset('assets/images/plant.jpeg') }}"
                    alt="{{ $plant->name }}"
                    class="h-56 w-full object-cover transform group-hover:scale-110 transition-transform duration-300">
            </div>

            <div class="p-6">
                <h3 class="text-xl font-semibold text-green-800 mb-2">{{ $plant->name }}</h3>
                <p class="text-sm text-gray-600 mb-4 line-clamp-2">{{ $plant->description }}</p>

                <div class="flex flex-wrap gap-2 mb-4">
                    @foreach ($plant->tags as $tag)
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            {{ $tag->name }}
                        </span>
                    @endforeach
                </div>

                <a href="{{ route('plant', $plant) }}"
                    class="inline-flex items-center justify-center w-full px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors duration-200">
                    View Details
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        </div>
    @endforeach
</div>

{{ $plants->links() }}
