@php
    $parts = [];
@endphp

@extends('dashboard.layouts.template')

@section('content')
    <div class="bg-gradient-to-br from-green-50 to-emerald-100 flex-1 p-6 min-h-screen">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white rounded-xl shadow-sm p-8">
                <div class="max-w-7xl mx-auto">
                    <!-- Breadcrumb & Navigation -->
                    <nav class="mb-6 flex items-center justify-between">
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
                                <svg class="w-5 h-5 text-green-400 mx-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 5l7 7-7 7" />
                                </svg>
                            </li>
                            <li class="flex items-center">
                                <a href="{{ route('plants.index') }}" class="text-green-600 hover:text-green-800">
                                    Plants
                                </a>
                                <svg class="w-5 h-5 text-green-400 mx-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 5l7 7-7 7" />
                                </svg>
                            </li>
                            <li class="text-green-800 font-semibold">
                                Add New Plant
                            </li>
                        </ol>

                        <a href="{{ route('plants.index') }}" class="group">
                            <div
                                class="flex items-center px-4 py-2 text-green-600 hover:text-green-800 rounded-lg transition-all duration-300 hover:bg-green-50">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 mr-2 transform group-hover:-translate-x-1 transition-transform duration-300"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                                <span class="font-medium">Back to Plants</span>
                            </div>
                        </a>
                    </nav>

                    <!-- Header Content -->
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-4xl font-bold text-green-800 tracking-tight mb-3">
                                Add New Plant
                            </h1>
                            <p class="text-green-600 max-w-2xl">
                                Expand your botanical collection by adding a new plant. Fill in the details carefully to
                                ensure accurate tracking and management.
                            </p>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="bg-green-50 p-4 rounded-lg shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a1 1 0 01-1-1v-3a1 1 0 011-1h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Form Card -->
            <div class="bg-white rounded-2xl shadow-xl">
                <div class="p-8">
                    @if ($errors->any())
                        <div class="mb-8 rounded-lg bg-red-50 p-4 border-l-4 border-red-500">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-red-800">There were errors with your submission</h3>
                                    <div class="mt-2 text-sm text-red-700">
                                        <ul class="list-disc list-inside space-y-1">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('plants.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Basic Information Section -->
                        <div
                            class="bg-gradient-to-br from-green-50 to-emerald-100 rounded-xl p-8 mb-8 shadow-lg relative overflow-hidden">
                            <div
                                class="absolute top-0 right-0 w-40 h-40 bg-green-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob">
                            </div>
                            <div
                                class="absolute -bottom-8 -left-8 w-40 h-40 bg-yellow-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
                            </div>

                            <h2 class="text-2xl font-semibold text-green-800 mb-6 relative">
                                Basic Information
                                <span class="absolute bottom-0 left-0 w-20 h-1 bg-green-500 rounded-full"></span>
                            </h2>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 relative">
                                <div class="space-y-6">
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-green-700 mb-2">
                                            Name <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative group">
                                            <input type="text" name="name" id="name" required
                                                class="w-full px-4 py-2 rounded-lg border-2 border-green-200 focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm"
                                                placeholder="Enter plant name">
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
                                    <div>
                                        <label for="scientific_name"
                                            class="block text-sm font-medium text-green-700 mb-2">Scientific Name</label>
                                        <div class="relative group">
                                            <input type="text" name="scientific_name" id="scientific_name"
                                                class="w-full px-4 py-2 rounded-lg border-2 border-green-200 focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm"
                                                placeholder="Enter scientific name">
                                            <div
                                                class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-green-600 group-hover:text-green-800 transition-colors duration-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                                    <path fill-rule="evenodd"
                                                        d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-6">
                                    <div>
                                        <label for="common_name"
                                            class="block text-sm font-medium text-green-700 mb-2">Common Name</label>
                                        <div class="relative group">
                                            <input type="text" name="common_name" id="common_name"
                                                class="w-full px-4 py-2 rounded-lg border-2 border-green-200 focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm"
                                                placeholder="Enter common name">
                                            <div
                                                class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-green-600 group-hover:text-green-800 transition-colors duration-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="habitat"
                                            class="block text-sm font-medium text-green-700 mb-2">Habitat</label>
                                        <div class="relative group">
                                            <input type="text" name="habitat" id="habitat"
                                                class="w-full px-4 py-2 rounded-lg border-2 border-green-200 focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm"
                                                placeholder="Enter habitat">
                                            <div
                                                class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-green-600 group-hover:text-green-800 transition-colors duration-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="md:col-span-2">
                                    <label for="description"
                                        class="block text-sm font-medium text-green-700 mb-2">Description</label>
                                    <textarea name="description" id="description" rows="4"
                                        class="w-full rounded-lg px-4 py-2 border-2 border-green-200 focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm resize-none"
                                        placeholder="Enter plant description"></textarea>
                                </div>
                                <div class="md:col-span-2">
                                    <label for="chemical_compounds"
                                        class="block text-sm font-medium text-green-700 mb-2">Chemical Compounds</label>
                                    <div class="relative group">
                                        <input type="text" name="chemical_compounds" id="chemical_compounds"
                                            class="w-full px-4 py-2 rounded-lg border-2 border-green-200 focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm"
                                            placeholder="Enter chemical compounds">
                                        <div
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-green-600 group-hover:text-green-800 transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M7 2a1 1 0 00-.707 1.707L7 4.414v3.758a1 1 0 01-.293.707l-4 4C.817 14.769 2.156 18 4.828 18h10.343c2.673 0 4.012-3.231 2.122-5.121l-4-4A1 1 0 0113 8.172V4.414l.707-.707A1 1 0 0013 2H7zm2 6.172V4h2v4.172a3 3 0 00.879 2.12l1.027 1.028a4 4 0 00-2.171.102l-.47.156a4 4 0 01-2.53 0l-.563-.187a1.993 1.993 0 00-.114-.035l1.063-1.063A3 3 0 009 8.172z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Thumbnail Image Upload Section -->
                        <div
                            class="bg-gradient-to-br from-green-50 to-emerald-100 rounded-xl p-8 mb-8 shadow-lg relative overflow-hidden">
                            <div
                                class="absolute top-0 right-0 w-40 h-40 bg-green-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob">
                            </div>
                            <div
                                class="absolute -bottom-8 -left-8 w-40 h-40 bg-emerald-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
                            </div>

                            <h2 class="text-2xl font-semibold text-green-800 mb-6 relative">
                                Plant Thumbnail
                                <span class="absolute bottom-0 left-0 w-20 h-1 bg-green-500 rounded-full"></span>
                            </h2>

                            <div x-data="{ previewUrl: null }" x-on:dragover.prevent="$event.dataTransfer.dropEffect = 'copy'"
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
                                Additional Plant Images
                                <span class="absolute bottom-0 left-0 w-20 h-1 bg-amber-500 rounded-full"></span>
                            </h2>

                            <div x-data="imageUploader()" class="space-y-4">
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
                                            <img :src="image.preview"
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

                        <!-- Taxonomy Classification Section -->
                        <div
                            class="bg-gradient-to-br from-green-50 to-teal-100 rounded-xl p-8 mb-8 shadow-lg relative overflow-hidden">
                            <div
                                class="absolute top-0 right-0 w-40 h-40 bg-teal-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob">
                            </div>
                            <div
                                class="absolute -bottom-8 -left-8 w-40 h-40 bg-green-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
                            </div>

                            <h2 class="text-2xl font-semibold text-teal-800 mb-6 relative">
                                Classification
                                <span class="absolute bottom-0 left-0 w-20 h-1 bg-teal-500 rounded-full"></span>
                            </h2>

                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                <div class="relative group">
                                    <label for="kingdom"
                                        class="block text-sm font-medium text-teal-700 mb-2">Kingdom</label>
                                    <input type="text" name="kingdom" id="kingdom"
                                        class="w-full px-4 py-2 rounded-lg border-2 border-teal-200 focus:border-teal-500 focus:ring focus:ring-teal-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm"
                                        placeholder="Enter kingdom">
                                    <div
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-teal-500 opacity-0 group-focus-within:opacity-100 transition-opacity">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="relative group">
                                    <label for="phylum"
                                        class="block text-sm font-medium text-teal-700 mb-2">Division</label>
                                    <input type="text" name="phylum" id="phylum"
                                        class="w-full px-4 py-2 rounded-lg border-2 border-teal-200 focus:border-teal-500 focus:ring focus:ring-teal-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm"
                                        placeholder="Enter phylum">
                                    <div
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-teal-500 opacity-0 group-focus-within:opacity-100 transition-opacity">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="relative group">
                                    <label for="class"
                                        class="block text-sm font-medium text-teal-700 mb-2">Class</label>
                                    <input type="text" name="class" id="class"
                                        class="w-full px-4 py-2 rounded-lg border-2 border-teal-200 focus:border-teal-500 focus:ring focus:ring-teal-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm"
                                        placeholder="Enter class">
                                    <div
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-teal-500 opacity-0 group-focus-within:opacity-100 transition-opacity">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="relative group">
                                    <label for="order"
                                        class="block text-sm font-medium text-teal-700 mb-2">Order</label>
                                    <input type="text" name="order" id="order"
                                        class="w-full px-4 py-2 rounded-lg border-2 border-teal-200 focus:border-teal-500 focus:ring focus:ring-teal-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm"
                                        placeholder="Enter order">
                                    <div
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-teal-500 opacity-0 group-focus-within:opacity-100 transition-opacity">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="relative group">
                                    <label for="family"
                                        class="block text-sm font-medium text-teal-700 mb-2">Family</label>
                                    <input type="text" name="family" id="family"
                                        class="w-full px-4 py-2 rounded-lg border-2 border-teal-200 focus:border-teal-500 focus:ring focus:ring-teal-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm"
                                        placeholder="Enter family">
                                    <div
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-teal-500 opacity-0 group-focus-within:opacity-100 transition-opacity">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="relative group">
                                    <label for="genus"
                                        class="block text-sm font-medium text-teal-700 mb-2">Genus</label>
                                    <input type="text" name="genus" id="genus"
                                        class="w-full px-4 py-2 rounded-lg border-2 border-teal-200 focus:border-teal-500 focus:ring focus:ring-teal-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm"
                                        placeholder="Enter genus">
                                    <div
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-teal-500 opacity-0 group-focus-within:opacity-100 transition-opacity">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="relative group">
                                    <label for="species"
                                        class="block text-sm font-medium text-teal-700 mb-2">Species</label>
                                    <input type="text" name="species" id="species"
                                        class="w-full px-4 py-2 rounded-lg border-2 border-teal-200 focus:border-teal-500 focus:ring focus:ring-teal-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm"
                                        placeholder="Enter species">
                                    <div
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-teal-500 opacity-0 group-focus-within:opacity-100 transition-opacity">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pharmacology Section -->
                        <div
                            class="bg-gradient-to-br from-amber-50 to-orange-100 rounded-xl p-8 mb-8 shadow-lg relative overflow-hidden">
                            <div
                                class="absolute top-0 right-0 w-40 h-40 bg-orange-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob">
                            </div>

                            <h2 class="text-2xl font-semibold text-orange-800 mb-6 relative">
                                Pharmacological Aspects
                                <span class="absolute bottom-0 left-0 w-20 h-1 bg-orange-500 rounded-full"></span>
                            </h2>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="relative group">
                                    <label for="toxicity"
                                        class="block text-sm font-medium text-orange-700 mb-2">Toxicity</label>
                                    <textarea name="toxicity" id="toxicity" rows="3"
                                        class="w-full px-4 py-2 rounded-lg border-2 border-orange-200 focus:border-orange-500 focus:ring focus:ring-orange-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm resize-none"
                                        placeholder="Enter toxicity information"></textarea>
                                    <div
                                        class="absolute top-8 right-2 pointer-events-none text-orange-500 opacity-0 group-focus-within:opacity-100 transition-opacity">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="relative group">
                                    <label for="contraindications"
                                        class="block text-sm font-medium text-orange-700 mb-2">Contraindications</label>
                                    <textarea name="contraindications" id="contraindications" rows="3"
                                        class="w-full px-4 py-2 rounded-lg border-2 border-orange-200 focus:border-orange-500 focus:ring focus:ring-orange-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm resize-none"
                                        placeholder="Enter contraindications"></textarea>
                                    <div
                                        class="absolute top-8 right-2 pointer-events-none text-orange-500 opacity-0 group-focus-within:opacity-100 transition-opacity">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="relative group">
                                    <label for="warnings"
                                        class="block text-sm font-medium text-orange-700 mb-2">Warnings</label>
                                    <textarea name="warnings" id="warnings" rows="3"
                                        class="w-full px-4 py-2 rounded-lg border-2 border-orange-200 focus:border-orange-500 focus:ring focus:ring-orange-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm resize-none"
                                        placeholder="Enter warnings"></textarea>
                                    <div
                                        class="absolute top-8 right-2 pointer-events-none text-orange-500 opacity-0 group-focus-within:opacity-100 transition-opacity">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="relative group">
                                    <label for="precautions"
                                        class="block text-sm font-medium text-orange-700 mb-2">Precautions</label>
                                    <textarea name="precautions" id="precautions" rows="3"
                                        class="w-full px-4 py-2 rounded-lg border-2 border-orange-200 focus:border-orange-500 focus:ring focus:ring-orange-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm resize-none"
                                        placeholder="Enter precautions"></textarea>
                                    <div
                                        class="absolute top-8 right-2 pointer-events-none text-orange-500 opacity-0 group-focus-within:opacity-100 transition-opacity">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="relative group md:col-span-2">
                                    <label for="side_effects" class="block text-sm font-medium text-orange-700 mb-2">Side
                                        Effects</label>
                                    <textarea name="side_effects" id="side_effects" rows="3"
                                        class="w-full px-4 py-2 rounded-lg border-2 border-orange-200 focus:border-orange-500 focus:ring focus:ring-orange-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm resize-none"
                                        placeholder="Enter side effects"></textarea>
                                    <div
                                        class="absolute top-8 right-2 pointer-events-none text-orange-500 opacity-0 group-focus-within:opacity-100 transition-opacity">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Pharmacology Section -->
                        <div
                            class="bg-gradient-to-br from-amber-50 to-orange-100 rounded-xl p-8 mb-8 shadow-lg relative overflow-hidden">
                            <div
                                class="absolute top-0 right-0 w-40 h-40 bg-orange-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob">
                            </div>
                            <div
                                class="absolute -bottom-8 -left-8 w-40 h-40 bg-amber-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
                            </div>

                            <h2 class="text-2xl font-semibold text-orange-800 mb-6 relative">
                                Pharmacological Aspects
                                <span class="absolute bottom-0 left-0 w-20 h-1 bg-orange-500 rounded-full"></span>
                            </h2>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="relative group">
                                    <label for="toxicity"
                                        class="block text-sm font-medium text-orange-700 mb-2">Toxicity</label>
                                    <textarea name="toxicity" id="toxicity" rows="3"
                                        class="w-full px-4 py-2 rounded-lg border-2 border-orange-200 focus:border-orange-500 focus:ring focus:ring-orange-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm resize-none"
                                        placeholder="Enter toxicity information"></textarea>
                                    <div
                                        class="absolute top-8 right-2 pointer-events-none text-orange-500 opacity-0 group-focus-within:opacity-100 transition-opacity">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="relative group">
                                    <label for="contraindications"
                                        class="block text-sm font-medium text-orange-700 mb-2">Contraindications</label>
                                    <textarea name="contraindications" id="contraindications" rows="3"
                                        class="w-full px-4 py-2 rounded-lg border-2 border-orange-200 focus:border-orange-500 focus:ring focus:ring-orange-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm resize-none"
                                        placeholder="Enter contraindications"></textarea>
                                    <div
                                        class="absolute top-8 right-2 pointer-events-none text-orange-500 opacity-0 group-focus-within:opacity-100 transition-opacity">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="relative group">
                                    <label for="warnings"
                                        class="block text-sm font-medium text-orange-700 mb-2">Warnings</label>
                                    <textarea name="warnings" id="warnings" rows="3"
                                        class="w-full px-4 py-2 rounded-lg border-2 border-orange-200 focus:border-orange-500 focus:ring focus:ring-orange-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm resize-none"
                                        placeholder="Enter warnings"></textarea>
                                    <div
                                        class="absolute top-8 right-2 pointer-events-none text-orange-500 opacity-0 group-focus-within:opacity-100 transition-opacity">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="relative group">
                                    <label for="precautions"
                                        class="block text-sm font-medium text-orange-700 mb-2">Precautions</label>
                                    <textarea name="precautions" id="precautions" rows="3"
                                        class="w-full px-4 py-2 rounded-lg border-2 border-orange-200 focus:border-orange-500 focus:ring focus:ring-orange-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm resize-none"
                                        placeholder="Enter precautions"></textarea>
                                    <div
                                        class="absolute top-8 right-2 pointer-events-none text-orange-500 opacity-0 group-focus-within:opacity-100 transition-opacity">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="relative group md:col-span-2">
                                    <label for="side_effects" class="block text-sm font-medium text-orange-700 mb-2">Side
                                        Effects</label>
                                    <textarea name="side_effects" id="side_effects" rows="3"
                                        class="w-full px-4 py-2 rounded-lg border-2 border-orange-200 focus:border-orange-500 focus:ring focus:ring-orange-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm resize-none"
                                        placeholder="Enter side effects"></textarea>
                                    <div
                                        class="absolute top-8 right-2 pointer-events-none text-orange-500 opacity-0 group-focus-within:opacity-100 transition-opacity">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="bg-gradient-to-br from-yellow-50 to-amber-100 rounded-xl p-8 mb-8 shadow-lg relative overflow-hidden">
                            <div
                                class="absolute top-0 right-0 w-40 h-40 bg-yellow-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob">
                            </div>
                            <div
                                class="absolute -bottom-8 -left-8 w-40 h-40 bg-amber-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
                            </div>

                            <h2 class="text-2xl font-semibold text-amber-800 mb-6 relative">
                                Used Parts
                                <span class="absolute bottom-0 left-0 w-20 h-1 bg-amber-500 rounded-full"></span>
                            </h2>

                            <div id="usedPartContainer" class="space-y-4">
                                @foreach ($parts as $index => $part)
                                    <div class="flex items-center mb-4 usedPartRow group">
                                        <div class="relative flex-1 mr-2">
                                            <input type="text" name="parts[{{ $index }}][part]"
                                                placeholder="Part" required value="{{ $part['part'] ?? '' }}"
                                                class="w-full px-4 py-2 rounded-lg border-2 border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm" />
                                            <div
                                                class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="relative flex-1">
                                            <input type="text" name="parts[{{ $index }}][usage]"
                                                placeholder="Usage" required value="{{ $part['usage'] ?? '' }}"
                                                class="w-full px-4 py-2 rounded-lg border-2 border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm" />
                                            <div
                                                class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                                </svg>
                                            </div>
                                        </div>
                                        <button type="button"
                                            class="ml-2 p-2 text-white bg-red-500 rounded-lg hover:bg-red-600 transition-colors duration-200 removePartBtn opacity-0 group-hover:opacity-100 focus:opacity-100">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" id="addPartBtn"
                                class="mt-6 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors duration-200 flex items-center justify-center w-full sm:w-auto">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Add Part
                            </button>
                        </div>


                        <!-- Submit Button Section -->
                        <div class="flex justify-end mt-8">
                            <button type="submit"
                                class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg shadow-sm hover:shadow-md transition duration-300">
                                Save Plant
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('styles')
        <style>
            @keyframes blob {
                0% {
                    transform: translate(0px, 0px) scale(1);
                }

                33% {
                    transform: translate(30px, -50px) scale(1.1);
                }

                66% {
                    transform: translate(-20px, 20px) scale(0.9);
                }

                100% {
                    transform: translate(0px, 0px) scale(1);
                }
            }

            .animate-blob {
                animation: blob 7s infinite;
            }

            .animation-delay-2000 {
                animation-delay: 2s;
            }
        </style>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    @endpush
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {


            let partIndex = {{ count($parts) }}; // Start indexing for dynamic parts

            // Add new part row
            document.getElementById('addPartBtn').addEventListener('click', function() {
                const container = document.getElementById('usedPartContainer');
                const newRow = document.createElement('div');
                newRow.classList.add('flex', 'items-center', 'mb-4', 'usedPartRow', 'group');
                newRow.innerHTML = `
            <div class="relative flex-1 mr-2">
                <input type="text" name="parts[${partIndex}][part]" placeholder="Part" required
                    class="w-full px-4 py-2 rounded-lg border-2 border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm" />
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
            </div>
            <div class="relative flex-1">
                <input type="text" name="parts[${partIndex}][usage]" placeholder="Usage" required
                    class="w-full px-4 py-2 rounded-lg border-2 border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200 transition duration-200 bg-white bg-opacity-80 backdrop-filter backdrop-blur-sm" />
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </div>
            </div>
            <button type="button" class="ml-2 p-2 text-white bg-red-500 rounded-lg hover:bg-red-600 transition-colors duration-200 removePartBtn opacity-0 group-hover:opacity-100 focus:opacity-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        `;
                container.appendChild(newRow);
                partIndex++;

                // Add event listener to remove button
                newRow.querySelector('.removePartBtn').addEventListener('click', function() {
                    newRow.remove();
                });
            });

            // Initial remove buttons
            document.querySelectorAll('.removePartBtn').forEach(button => {
                button.addEventListener('click', function() {
                    this.closest('.usedPartRow').remove();
                });
            });
        });

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

        $(document).ready(function() {
            // Autocomplete for Kingdom
            $("#kingdom").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "/api/kingdoms",
                        dataType: "json",
                        data: {
                            query: request.term
                        },
                        success: function(data) {
                            response($.map(data, function(item) {
                                return {
                                    label: item.name,
                                    value: item.id
                                };
                            }));
                        }
                    });
                },
                select: function(event, ui) {
                    $("#kingdom").val(ui.item.label);
                    $("#kingdom").data("selected-id", ui.item.value);
                    $("#phylum").prop("disabled", false);
                    return false;
                }
            });

            // Autocomplete for Phylum
            $("#phylum").autocomplete({
                source: function(request, response) {
                    const kingdomId = $("#kingdom").data("selected-id");
                    if (!kingdomId) return;
                    $.ajax({
                        url: `/api/phylums`,
                        dataType: "json",
                        data: {
                            kingdom_id: kingdomId,
                            query: request.term
                        },
                        success: function(data) {
                            response($.map(data, function(item) {
                                return {
                                    label: item.name,
                                    value: item.id
                                };
                            }));
                        }
                    });
                },
                select: function(event, ui) {
                    $("#phylum").val(ui.item.label);
                    $("#phylum").data("selected-id", ui.item.value);
                    $("#class").prop("disabled", false);
                    return false;
                }
            });

            // Autocomplete for Class
            $("#class").autocomplete({
                source: function(request, response) {
                    const phylumId = $("#phylum").data("selected-id");
                    if (!phylumId) return;
                    $.ajax({
                        url: `/api/classes`,
                        dataType: "json",
                        data: {
                            phylum_id: phylumId,
                            query: request.term
                        },
                        success: function(data) {
                            response($.map(data, function(item) {
                                return {
                                    label: item.name,
                                    value: item.id
                                };
                            }));
                        }
                    });
                },
                select: function(event, ui) {
                    $("#class").val(ui.item.label);
                    $("#class").data("selected-id", ui.item.value);
                    $("#order").prop("disabled", false);
                    return false;
                }
            });

            // Autocomplete for Order
            $("#order").autocomplete({
                source: function(request, response) {
                    const classId = $("#class").data("selected-id");
                    if (!classId) return;
                    $.ajax({
                        url: `/api/orders`,
                        dataType: "json",
                        data: {
                            class_id: classId,
                            query: request.term
                        },
                        success: function(data) {
                            response($.map(data, function(item) {
                                return {
                                    label: item.name,
                                    value: item.id
                                };
                            }));
                        }
                    });
                },
                select: function(event, ui) {
                    $("#order").val(ui.item.label);
                    $("#order").data("selected-id", ui.item.value);
                    $("#family").prop("disabled", false);
                    return false;
                }
            });

            // Autocomplete for Family
            $("#family").autocomplete({
                source: function(request, response) {
                    const orderId = $("#order").data("selected-id");
                    if (!orderId) return;
                    $.ajax({
                        url: `/api/families`,
                        dataType: "json",
                        data: {
                            order_id: orderId,
                            query: request.term
                        },
                        success: function(data) {
                            response($.map(data, function(item) {
                                return {
                                    label: item.name,
                                    value: item.id
                                };
                            }));
                        }
                    });
                },
                select: function(event, ui) {
                    $("#family").val(ui.item.label);
                    $("#family").data("selected-id", ui.item.value);
                    $("#genus").prop("disabled", false);
                    return false;
                }
            });

            // Autocomplete for Genus
            $("#genus").autocomplete({
                source: function(request, response) {
                    const familyId = $("#family").data("selected-id");
                    if (!familyId) return;
                    $.ajax({
                        url: `/api/genera`,
                        dataType: "json",
                        data: {
                            family_id: familyId,
                            query: request.term
                        },
                        success: function(data) {
                            response($.map(data, function(item) {
                                return {
                                    label: item.name,
                                    value: item.id
                                };
                            }));
                        }
                    });
                },
                select: function(event, ui) {
                    $("#genus").val(ui.item.label);
                    $("#genus").data("selected-id", ui.item.value);
                    $("#species").prop("disabled", false);
                    return false;
                }
            });

            // Autocomplete for Species
            $("#species").autocomplete({
                source: function(request, response) {
                    const genusId = $("#genus").data("selected-id");
                    if (!genusId) return;
                    $.ajax({
                        url: `/api/species`,
                        dataType: "json",
                        data: {
                            genus_id: genusId,
                            query: request.term
                        },
                        success: function(data) {
                            response($.map(data, function(item) {
                                return {
                                    label: item.name,
                                    value: item.id
                                };
                            }));
                        }
                    });
                },
                select: function(event, ui) {
                    $("#species").val(ui.item.label);
                    $("#species").data("selected-id", ui.item.value);
                    return false;
                }
            });
        });
    </script>
@endsection
