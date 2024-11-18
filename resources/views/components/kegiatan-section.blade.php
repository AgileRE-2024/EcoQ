<section class="py-16 bg-white relative">
    <div class="container mx-auto">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-12">
            <h2 class="text-4xl font-libre font-bold text-green-900">Kegiatan</h2>
            <a href="/kegiatan" class="text-green-900 font-roboto flex items-center hover:underline">
                VIEW ALL POSTS <span class="ml-2">→</span>
            </a>
        </div>

        <!-- Main Content -->
        <div class="flex space-x-8 z-20">
            <!-- Featured Post -->
            <div class="flex-1 space-y-4 z-20">
                <div class="overflow-hidden rounded-lg z-20">
                    <img src="{{ asset('assets/images/' . $posts[0]['image']) }}" alt="{{ $posts[0]['title'] }}" class="object-cover w-full h-72">
                </div>
                <h3 class="text-2xl font-libre text-green-900 font-bold">{{ $posts[0]['title'] }}</h3>
                <p class="text-gray-700 font-roboto">{{ $posts[0]['description'] }}</p>
                <p class="text-gray-500 text-sm">{{ $posts[0]['date'] }}</p>
            </div>

            <!-- Smaller Posts Section -->
            <div class="flex flex-col space-y-4 w-1/3 z-20"">
                @foreach ($posts as $key => $post)
                @if ($key > 0)
                <div class="flex items-start space-x-4 border-b pb-4">
                    <div class="flex-shrink-0 w-20 h-20 overflow-hidden rounded-lg">
                        <img src="{{ asset('assets/images/' . $post['image']) }}" alt="{{ $post['title'] }}" class="object-cover w-full h-full">
                    </div>
                    <div>
                        <h4 class="text-lg font-libre font-bold text-green-900">{{ $post['title'] }}</h4>
                        <p class="text-gray-700 font-roboto text-sm">{{ Str::limit($post['description'], 80) }}</p>
                        <p class="text-gray-500 text-sm">{{ $post['date'] }}</p>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>

    <!-- Decorative Leaves -->
    <div class="absolute -top-56 right-12 transform translate-x-12 -translate-y-12 opacity-20 z-10">
        <img src="{{ asset('assets/images/vector1.png') }}" alt="Decorative Leaf" class="w-xl h-xl">
    </div>
</section>
