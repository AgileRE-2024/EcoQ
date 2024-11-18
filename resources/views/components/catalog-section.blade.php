<section class="bg-green-900 py-16">
    <div class="container mx-auto grid grid-cols-2 gap-8 items-center">
        <!-- Image Section -->
        <div class="space-y-8">
            <div class="overflow-hidden rounded-lg">
                <img src="{{ asset('assets/images/plant.jpeg') }}" alt="Catalog Image 1" class="object-cover w-full h-64">
            </div>
            <div class="overflow-hidden rounded-lg">
                <img src="{{ asset('assets/images/plant.jpeg') }}" alt="Catalog Image 2" class="object-cover w-full h-64">
            </div>
        </div>

        <!-- Text Section -->
        <div class="text-white space-y-6 relative">
            <h2 class="text-4xl font-libre font-bold">Katalog Tanaman</h2>
            <p class="text-lg font-roboto leading-relaxed">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tincidunt facilisis nunc.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tincidunt facilisis nunc.
            </p>
            <a href="#"
               class="inline-block px-6 py-3 border border-white text-white font-semibold rounded hover:bg-white hover:text-green-900 transition">
                LEARN MORE
            </a>

            <!-- Decorative Leaves -->
            <div class="absolute top-0 right-0 transform translate-x-12 -translate-y-12 opacity-20">
                <img src="{{ asset('assets/images/vector.png') }}" alt="Decorative Leaf" class="w-xl h-xl">
            </div>
        </div>
    </div>
</section>
