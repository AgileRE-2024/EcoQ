@extends('dashboard.layouts.template')

@section('content')
    <div class="bg-gradient-to-br from-green-50 to-emerald-100 flex-1 p-6 min-h-screen">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white rounded-xl shadow-sm p-8">
                <div class="max-w-7xl mx-auto">
                    <!-- Breadcrumb -->
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
                                <a href="{{ route('events.index') }}"
                                    class="text-green-600 hover:text-green-800 ml-2">Events</a>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 5l7 7-7 7" />
                                </svg>
                                <span class="ml-2 text-green-800">Update Event</span>
                            </li>
                        </ol>
                    </nav>

                    <!-- Header Content -->
                    <div class="flex flex-col space-y-8 mb-6">
                        <div>
                            <h1 class="text-4xl font-bold text-green-800 tracking-tight">Edit Event: {{ $event->title }}
                            </h1>
                            <p class="mt-2 text-base text-green-600">Update the information for this plant. Ensure all
                                details are accurate for proper tracking
                                and
                                management</p>
                        </div>
                    </div>

                    <!-- Event Creation Form -->
                    <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="garden_id" value="{{ Auth::user()->garden->id }}">
                        <!-- Basic Event Information Section -->
                        <div
                            class="bg-gradient-to-br from-green-50 to-emerald-100 rounded-xl p-8 mb-8 shadow-lg relative overflow-hidden">
                            <div
                                class="absolute top-0 right-0 w-40 h-40 bg-green-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob">
                            </div>
                            <div
                                class="absolute -bottom-8 -left-8 w-40 h-40 bg-yellow-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
                            </div>

                            <h2 class="text-2xl font-semibold text-green-800 mb-6 relative">
                                Event Details
                                <span class="absolute bottom-0 left-0 w-20 h-1 bg-green-500 rounded-full"></span>
                            </h2>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Title -->
                                <div>
                                    <label for="title" class="block text-sm font-medium text-green-700 mb-2">
                                        Event Title <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative group">
                                        <input type="text" name="title" id="title" required
                                            value="{{ old('title', $event->title) }}"
                                            class="w-full px-4 py-2 rounded-lg border-2 border-green-200 focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm"
                                            placeholder="Enter event title">
                                        <div
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-green-600 group-hover:text-green-800 transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <!-- Location -->
                                <div>
                                    <label for="location" class="block text-sm font-medium text-green-700 mb-2">
                                        Location <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative group">
                                        <input type="text" name="location" id="location" required
                                            value="{{ old('location', $event->location) }}"
                                            class="w-full px-4 py-2 rounded-lg border-2 border-green-200 focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm"
                                            placeholder="Enter event location">
                                        <div
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-green-600 group-hover:text-green-800 transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <!-- Date and Time -->
                                <div>
                                    <label for="date" class="block text-sm font-medium text-green-700 mb-2">
                                        Event Date <span class="text-red-500">*</span>
                                    </label>
                                    <input type="date" name="date" id="date" required
                                        value="{{ old('date', $event->date) }}"
                                        class="w-full px-4 py-2 rounded-lg border-2 border-green-200 focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm">
                                </div>

                                <div>
                                    <label for="time" class="block text-sm font-medium text-green-700 mb-2">
                                        Event Time <span class="text-red-500">*</span>
                                    </label>
                                    <input type="time" name="time" id="time" required
                                        value="{{ old('time', $event->time) }}"
                                        class="w-full px-4 py-2 rounded-lg border-2 border-green-200 focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm">
                                </div>

                                <!-- Description -->
                                <div class="md:col-span-2">
                                    <label for="description" class="block text-sm font-medium text-green-700 mb-2">
                                        Event Description <span class="text-red-500">*</span>
                                    </label>
                                    <textarea name="description" id="description" rows="4" required
                                        class="w-full rounded-lg px-4 py-2 border-2 border-green-200 focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm resize-none"
                                        placeholder="Enter event description">{{ $event->description }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Main Event Image Upload Section -->
                        <div
                            class="bg-gradient-to-br from-green-50 to-emerald-100 rounded-xl p-8 mb-8 shadow-lg relative overflow-hidden">
                            <div
                                class="absolute top-0 right-0 w-40 h-40 bg-green-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob">
                            </div>
                            <div
                                class="absolute -bottom-8 -left-8 w-40 h-40 bg-emerald-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
                            </div>

                            <h2 class="text-2xl font-semibold text-green-800 mb-6 relative">
                                Event Thumbnail
                                <span class="absolute bottom-0 left-0 w-20 h-1 bg-green-500 rounded-full"></span>
                            </h2>

                            <div x-data="{ previewUrl: '{{ asset('storage/images/events/' . $event->image) }}' }" x-on:dragover.prevent="$event.dataTransfer.dropEffect = 'copy'"
                                x-on:drop.prevent="handleDrop($event)" class="relative">
                                <label for="image"
                                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-green-300 border-dashed rounded-lg cursor-pointer bg-white bg-opacity-50 hover:bg-opacity-75 transition duration-300">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-12 h-12 mb-4 text-green-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <p class="mb-2 text-sm text-green-600"><span class="font-semibold">Click to
                                                upload</span> or drag and drop</p>
                                        <p class="text-xs text-green-500">PNG, JPG or JPEG (MAX. 2MB)</p>
                                    </div>
                                    <input type="file" name="image" id="image" class="hidden" accept="image/*"
                                        x-on:change="handleFileSelect($event); previewUrl = URL.createObjectURL($event.target.files[0])" />
                                </label>
                                <div x-show="previewUrl" class="mt-4 relative w-full h-64 rounded-lg overflow-hidden">
                                    <img :src="previewUrl" class="w-full h-full object-cover" />
                                    <button @click="previewUrl = null; $refs.imageInput.value = ''"
                                        class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-2 hover:bg-red-600 transition-colors duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Images Upload Section -->
                        <div
                            class="bg-gradient-to-br from-yellow-50 to-amber-100 rounded-xl p-8 mb-8 shadow-lg relative overflow-hidden">
                            <div
                                class="absolute top-0 right-0 w-40 h-40 bg-yellow-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob">
                            </div>
                            <div
                                class="absolute -bottom-8 -left-8 w-40 h-40 bg-amber-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
                            </div>

                            <h2 class="text-2xl font-semibold text-amber-800 mb-6 relative">
                                Additional Event Images
                                <span class="absolute bottom-0 left-0 w-20 h-1 bg-amber-500 rounded-full"></span>
                            </h2>

                            <div x-data="imageUploader({{ json_encode($event->images) }})" class="space-y-4">
                                <div x-on:dragover.prevent="$event.dataTransfer.dropEffect = 'copy'"
                                    x-on:drop.prevent="handleDrop($event)" class="relative">
                                    <label for="images"
                                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-amber-300 border-dashed rounded-lg cursor-pointer bg-white bg-opacity-50 hover:bg-opacity-75 transition duration-300">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-12 h-12 mb-4 text-amber-500" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                            <p class="mb-2 text-sm text-amber-600"><span class="font-semibold">Click to
                                                    upload</span> or drag and drop</p>
                                            <p class="text-xs text-amber-500">PNG, JPG or JPEG (MAX. 2MB each)</p>
                                        </div>
                                        <input type="file" name="images[]" id="images" class="hidden"
                                            accept="image/png,image/jpeg,image/jpg" multiple
                                            x-on:change="handleFileSelect($event)" />
                                    </label>
                                </div>

                                <div class="mt-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4"
                                    x-ref="previewContainer">
                                    <template x-for="(image, index) in images" :key="index">
                                        <div class="relative group">
                                            <img :src="image.preview || image.image_url"
                                                class="w-full h-32 object-cover rounded-lg shadow-md" />
                                            <button type="button" @click="removeImage(index)"
                                                class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition-opacity duration-200 hover:bg-red-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end mt-8">
                            <button type="submit"
                                class="px-8 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition duration-300 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Update Event
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function imageUploader() {
        return {
            images: [],
            handleFileSelect(event) {
                const files = event.target.files;
                for (let i = 0; i < files.length; i++) {
                    this.addImage(files[i]);
                }
            },
            handleDrop(event) {
                const files = event.dataTransfer.files;
                for (let i = 0; i < files.length; i++) {
                    this.addImage(files[i]);
                }
            },
            addImage(file) {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.images.push({
                            file: file,
                            preview: e.target.result
                        });
                    };
                    reader.readAsDataURL(file);
                }
            },
            removeImage(index) {
                this.images.splice(index, 1);
            }
        };
    }

    function handleDrop(event) {
        const files = event.dataTransfer.files;
        if (files.length > 0) {
            const file = files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('[x-data]').__x.$data.previewUrl = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    function handleFileSelect(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('[x-data]').__x.$data.previewUrl = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
</script>
