@extends('dashboard.layouts.template')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-green-50 to-blue-50 p-6">
        <div class="max-w-6xl mx-auto">
            <!-- Back Button -->
            <div class="mb-8">
                <a href="{{ route('plants.index') }}"
                    class="group inline-flex items-center gap-2 px-4 py-2 bg-white text-green-600 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 border border-green-100 hover:border-green-200">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 transform group-hover:-translate-x-1 transition-transform duration-300" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span class="font-medium">Back to Plants</span>
                </a>
            </div>

            <!-- Main Form Card -->
            <div class="bg-white rounded-2xl shadow-xl">
                <div class="p-8">
                    <h1 class="text-3xl font-bold text-gray-800 mb-8">Add New Plant</h1>

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
                        <div class="bg-green-50 rounded-xl p-6 mb-8">
                            <h2 class="text-xl font-semibold text-green-800 mb-6">Basic Information</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-6">
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-green-700 mb-2">Name
                                            <span class="text-red-500">*</span></label>
                                        <input type="text" name="name" id="name" required
                                            class="w-full px-3 py-2 rounded-lg border-gray-300 focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200"
                                            placeholder="Enter plant name">
                                    </div>
                                    <div>
                                        <label for="scientific_name"
                                            class="block text-sm font-medium text-green-700 mb-2">Scientific Name</label>
                                        <input type="text" name="scientific_name" id="scientific_name"
                                            class="w-full px-3 py-2 rounded-lg border-gray-300 focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200"
                                            placeholder="Enter scientific name">
                                    </div>
                                </div>
                                <div class="space-y-6">
                                    <div>
                                        <label for="common_name"
                                            class="block text-sm font-medium text-green-700 mb-2">Common Name</label>
                                        <input type="text" name="common_name" id="common_name"
                                            class="w-full px-3 py-2 rounded-lg border-gray-300 focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200"
                                            placeholder="Enter common name">
                                    </div>
                                    <div>
                                        <label for="habitat"
                                            class="block text-sm font-medium text-green-700 mb-2">Habitat</label>
                                        <input type="text" name="habitat" id="habitat"
                                            class="w-full px-3 py-2 rounded-lg border-gray-300 focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200"
                                            placeholder="Enter habitat">
                                    </div>
                                </div>
                                <div class="md:col-span-2">
                                    <label for="description"
                                        class="block text-sm font-medium text-green-700 mb-2">Description</label>
                                    <textarea name="description" id="description" rows="4"
                                        class="w-full rounded-lg px-3 py-2 border-gray-300 focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200"
                                        placeholder="Enter plant description"></textarea>
                                </div>
                                <div class="md:col-span-2">
                                    <label for="chemical_compounds"
                                        class="block text-sm font-medium text-green-700 mb-2">Chemical Compounds</label>
                                    <input type="text" name="chemical_compounds" id="chemical_compounds"
                                        class="w-full px-3 py-2 rounded-lg border-gray-300 focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200"
                                        placeholder="Enter chemical compounds">
                                </div>
                            </div>
                        </div>

                        <!-- Image Upload Section -->
                        <div class="bg-blue-50 rounded-xl p-6 mb-8">
                            <h2 class="text-xl font-semibold text-blue-800 mb-6">Plant Image</h2>
                            <div class="flex items-center justify-center w-full">
                                <label for="image"
                                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-blue-300 border-dashed rounded-lg cursor-pointer bg-blue-50 hover:bg-blue-100 transition duration-300">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-12 h-12 mb-4 text-blue-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                            </path>
                                        </svg>
                                        <p class="mb-2 text-sm text-blue-600"><span class="font-medium">Click to
                                                upload</span> or drag and drop</p>
                                        <p class="text-xs text-blue-500">PNG, JPG or JPEG (MAX. 2MB)</p>
                                    </div>
                                    <input type="file" name="image" id="image" class="hidden"
                                        accept="image/*" />
                                </label>
                            </div>
                        </div>

                        <!-- Classification Section -->
                        <div class="bg-purple-50 rounded-xl p-6 mb-8">
                            <h2 class="text-xl font-semibold text-purple-800 mb-6">Classification</h2>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label for="kingdom"
                                        class="block text-sm font-medium text-purple-700 mb-2">Kingdom</label>
                                    <input type="text" name="kingdom" id="kingdom"
                                        class="w-full px-3 py-2 rounded-lg border-gray-300 focus:border-purple-500 focus:ring focus:ring-purple-200 transition duration-200"
                                        placeholder="Enter kingdom">
                                </div>
                                <div>
                                    <label for="division"
                                        class="block text-sm font-medium text-purple-700 mb-2">Division</label>
                                    <input type="text" name="division" id="division"
                                        class="w-full px-3 py-2 rounded-lg border-gray-300 focus:border-purple-500 focus:ring focus:ring-purple-200 transition duration-200"
                                        placeholder="Enter division">
                                </div>
                                <div>
                                    <label for="class"
                                        class="block text-sm font-medium text-purple-700 mb-2">Class</label>
                                    <input type="text" name="class" id="class"
                                        class="w-full px-3 py-2 rounded-lg border-gray-300 focus:border-purple-500 focus:ring focus:ring-purple-200 transition duration-200"
                                        placeholder="Enter class">
                                </div>
                                <div>
                                    <label for="order"
                                        class="block text-sm font-medium text-purple-700 mb-2">Order</label>
                                    <input type="text" name="order" id="order"
                                        class="w-full px-3 py-2 rounded-lg border-gray-300 focus:border-purple-500 focus:ring focus:ring-purple-200 transition duration-200"
                                        placeholder="Enter order">
                                </div>
                                <div>
                                    <label for="family"
                                        class="block text-sm font-medium text-purple-700 mb-2">Family</label>
                                    <input type="text" name="family" id="family"
                                        class="w-full px-3 py-2 rounded-lg border-gray-300 focus:border-purple-500 focus:ring focus:ring-purple-200 transition duration-200"
                                        placeholder="Enter family">
                                </div>
                                <div>
                                    <label for="genus"
                                        class="block text-sm font-medium text-purple-700 mb-2">Genus</label>
                                    <input type="text" name="genus" id="genus"
                                        class="w-full px-3 py-2 rounded-lg border-gray-300 focus:border-purple-500 focus:ring focus:ring-purple-200 transition duration-200"
                                        placeholder="Enter genus">
                                </div>
                                <div>
                                    <label for="species"
                                        class="block text-sm font-medium text-purple-700 mb-2">Species</label>
                                    <input type="text" name="species" id="species"
                                        class="w-full px-3 py-2 rounded-lg border-gray-300 focus:border-purple-500 focus:ring focus:ring-purple-200 transition duration-200"
                                        placeholder="Enter species">
                                </div>
                            </div>
                        </div>

                        <!-- Pharmacology Section -->
                        <div class="bg-red-50 rounded-xl p-6 mb-8">
                            <h2 class="text-xl font-semibold text-red-800 mb-6">Pharmacological Aspects</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="toxicity"
                                        class="block text-sm font-medium text-red-700 mb-2">Toxicity</label>
                                    <textarea name="toxicity" id="toxicity" rows="3"
                                        class="w-full px-3 py-2 rounded-lg border-gray-300 focus:border-red-500 focus:ring focus:ring-red-200 transition duration-200"
                                        placeholder="Enter toxicity information"></textarea>
                                </div>
                                <div>
                                    <label for="contraindications"
                                        class="block text-sm font-medium text-red-700 mb-2">Contraindications</label>
                                    <textarea name="contraindications" id="contraindications" rows="3"
                                        class="w-full rounded-lg px-3 py-2 border-gray-300 focus:border-red-500 focus:ring focus:ring-red-200 transition duration-200"
                                        placeholder="Enter contraindications"></textarea>
                                </div>
                                <div>
                                    <label for="warnings"
                                        class="block text-sm font-medium text-red-700 mb-2">Warnings</label>
                                    <textarea name="warnings" id="warnings" rows="3"
                                        class="w-full rounded-lg px-3 py-2 border-gray-300 focus:border-red-500 focus:ring focus:ring-red-200 transition duration-200"
                                        placeholder="Enter warnings"></textarea>
                                </div>
                                <div>
                                    <label for="precautions"
                                        class="block text-sm font-medium text-red-700 mb-2">Precautions</label>
                                    <textarea name="precautions" id="precautions" rows="3"
                                        class="w-full rounded-lg px-3 py-2 border-gray-300 focus:border-red-500 focus:ring focus:ring-red-200 transition duration-200"
                                        placeholder="Enter precautions"></textarea>
                                </div>
                                <div>
                                    <label for="side_effects" class="block text-sm font-medium text-red-700 mb-2">Side
                                        Effects</label>
                                    <textarea name="side_effects" id="side_effects" rows="3"
                                        class="w-full rounded-lg px-3 py-2 border-gray-300 focus:border-red-500 focus:ring focus:ring-red-200 transition duration-200"
                                        placeholder="Enter side effects"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Parts Used Section -->
                        <div class="bg-yellow-50 rounded-xl p-6 mb-8">
                            <h2 class="text-xl font-semibold text-yellow-800 mb-6">Used Parts</h2>
                            <div id="usedPartContainer">
                                <div class="flex items-center mb-4 usedPartRow">
                                    <input type="text" name="parts[0][part]" placeholder="Part" required
                                        class="w-full mr-2 px-3 py-2 rounded-lg border-gray-300 focus:border-yellow-500 focus:ring focus:ring-yellow-200 transition duration-200" />
                                    <input type="text" name="parts[0][usage]" placeholder="Usage" required
                                        class="w-full px-3 py-2 rounded-lg border-gray-300 focus:border-yellow-500 focus:ring focus:ring-yellow-200 transition duration-200" />
                                    <button type="button"
                                        class="ml-2 px-3 py-2 text-white bg-yellow-500 rounded-lg removePartBtn">Remove</button>
                                </div>
                            </div>
                            <button type="button" id="addPartBtn"
                                class="mt-4 px-4 py-2 bg-green-500 text-white rounded-lg">Add Part</button>
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

    <!-- JavaScript for Dynamic Parts Used -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let partIndex = 1; // Start indexing for dynamic parts

            // Add new part row
            document.getElementById('addPartBtn').addEventListener('click', function() {
                const container = document.getElementById('usedPartContainer');
                const newRow = document.createElement('div');
                newRow.classList.add('flex', 'items-center', 'mb-4', 'usedPartRow');
                newRow.innerHTML = `
            <input type="text" name="parts[${partIndex}][part]" placeholder="Part" required
                class="w-full mr-2 px-3 py-2 rounded-lg border-gray-300 focus:border-yellow-500 focus:ring focus:ring-yellow-200 transition duration-200" />
            <input type="text" name="parts[${partIndex}][usage]" placeholder="Usage" required
                class="w-full px-3 py-2 rounded-lg border-gray-300 focus:border-yellow-500 focus:ring focus:ring-yellow-200 transition duration-200" />
            <button type="button" class="ml-2 px-3 py-2 text-white bg-red-500 rounded-lg removePartBtn">Remove</button>
        `;
                container.appendChild(newRow);
                partIndex++;

                // Add event listener to remove button
                newRow.querySelector('.removePartBtn').addEventListener('click', function() {
                    newRow.remove();
                });
            });

            // Initial remove button for the first row
            document.querySelector('.removePartBtn').addEventListener('click', function() {
                this.closest('.usedPartRow').remove();
            });
        });
    </script>
@endsection
