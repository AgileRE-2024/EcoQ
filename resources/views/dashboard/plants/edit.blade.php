@extends('dashboard.layouts.template')

@php
    $partUsed = old('partUsed', $plant->partUsed ?? []);
@endphp
@section('content')
    <div class="bg-gray-100 flex-1 p-5 md:mt-10">
        <div class="mx-auto px-4">
            <h1 class="text-3xl font-semibold text-gray-800 my-2">Edit Tanaman: {{ $plant->name }}</h1>

            <form action="{{ route('plants.update', $plant->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="bg-white shadow-md rounded my-6 p-4">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama Tanaman</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $plant->name) }}" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="common_name" class="block text-gray-700 text-sm font-bold mb-2">Nama Umum</label>
                        <input type="text" id="common_name" name="common_name"
                            value="{{ old('common_name', $plant->common_name) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                        @error('common_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="scientific_name" class="block text-gray-700 text-sm font-bold mb-2">Nama Ilmiah</label>
                        <input type="text" id="scientific_name" name="scientific_name"
                            value="{{ old('scientific_name', $plant->scientific_name) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                        @error('scientific_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                        <textarea id="description" name="description" rows="4" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description', $plant->description) }}</textarea>
                        @error('description')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="habitat" class="block text-gray-700 text-sm font-bold mb-2">Habitat</label>
                        <input type="text" id="habitat" name="habitat" value="{{ old('habitat', $plant->habitat) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                        @error('habitat')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Gambar Tanaman</label>
                        <input type="file" id="image" name="image"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                        <small class="text-gray-600">Kosongkan jika tidak ingin mengganti gambar.</small>
                        @error('image')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <img src="{{ $plant->image ? asset('storage/images/plants/' . $plant->image) : asset('assets/images/plant.jpeg') }}"
                            alt="{{ $plant->name }}" class="w-32 h-32 object-cover rounded">
                    </div>

                    <h2 class="text-xl font-bold mt-8 mb-4">Classification</h2>

                    <div class="mb-4">
                        <label for="kingdom" class="block text-gray-700 text-sm font-bold mb-2">Kingdom</label>
                        <input type="text" id="kingdom" name="kingdom"
                            value="{{ old('kingdom', $plant->classification->kingdom) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                        @error('kingdom')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="division" class="block text-gray-700 text-sm font-bold mb-2">Division</label>
                        <input type="text" id="division" name="division"
                            value="{{ old('division', $plant->classification->division) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                        @error('division')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="class" class="block text-gray-700 text-sm font-bold mb-2">Class</label>
                        <input type="text" id="class" name="class"
                            value="{{ old('class', $plant->classification->class) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                        @error('class')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="order" class="block text-gray-700 text-sm font-bold mb-2">Family</label>
                        <input type="text" id="order" name="order"
                            value="{{ old('order', $plant->classification->order) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                        @error('order')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="family" class="block text-gray-700 text-sm font-bold mb-2">Family</label>
                        <input type="text" id="family" name="family"
                            value="{{ old('family', $plant->classification->family) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                        @error('family')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mb-4">
                        <label for="genus" class="block text-gray-700 text-sm font-bold mb-2">Genus</label>
                        <input type="text" id="genus" name="genus"
                            value="{{ old('genus', $plant->classification->genus) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                        @error('genus')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="species" class="block text-gray-700 text-sm font-bold mb-2">Species</label>
                        <input type="text" id="species" name="species"
                            value="{{ old('species', $plant->classification->species) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                        @error('species')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>


                    <h2 class="text-xl font-bold mt-8 mb-4">Pharmacology Aspect</h2>
                    <div class="mb-4">
                        <label for="toxicity" class="block text-gray-700 text-sm font-bold mb-2">Species</label>
                        <textarea id="toxicity" name="toxicity" rows="4"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('toxicity', $plant->pharmacologyAspect->toxicity) }}</textarea>
                        @error('toxicity')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="contraindications"
                            class="block text-gray-700 text-sm font-bold mb-2">Contraindication</label>
                        <textarea id="contraindications" name="contraindications" rows="4"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('contraindications', $plant->pharmacologyAspect->contraindications) }}</textarea>
                        @error('contraindications')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- side_effects --}}
                    <div class="mb-4">
                        <label for="side_effects" class="block text-gray-700 text-sm font-bold mb-2">Side Effects</label>
                        <textarea id="side_effects" name="side_effects" rows="4"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('side_effects', $plant->pharmacologyAspect->side_effects) }}</textarea>
                        @error('side_effects')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- warnings --}}
                    <div class="mb-4">
                        <label for="warnings" class="block text-gray-700 text-sm font-bold mb-2">Warnings</label>
                        <textarea id="warnings" name="warnings" rows="4"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('warnings', $plant->pharmacologyAspect->warnings) }}</textarea>
                        @error('warnings')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- precautions --}}
                    <div class="mb-4">
                        <label for="precautions" class="block text-gray-700 text-sm font-bold mb-2">Precautions</label>
                        <textarea id="precautions" name="precautions" rows="4"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('precautions', $plant->pharmacologyAspect->precautions) }}</textarea>
                        @error('precautions')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>


                    <h2 class="text-xl font-bold mt-8 mb-4">Part Used</h2>
                    <div id="part-used-section">
                        @foreach (old('partUsed', $plant->partUsed ?? []) as $index => $part)
                            <div class="flex mb-4 part-used-item">
                                <input type="text" name="partUsed[{{ $index }}][part]"
                                    value="{{ $part['part'] ?? '' }}" placeholder="Part"
                                    class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mr-2" />
                                <input type="text" name="partUsed[{{ $index }}][usage]"
                                    value="{{ $part['usage'] ?? '' }}" placeholder="Usage"
                                    class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                                <button type="button"
                                    class="remove-part-used bg-red-500 text-white rounded px-2 py-1 ml-2">Remove</button>
                            </div>
                        @endforeach
                        <button type="button" id="add-part-used"
                            class="bg-green-500 text-white rounded my-4 px-4 py-2">Add
                            Part Used</button>
                    </div>



                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update
                            Tanaman</button>
                        <a href="{{ route('plants.index') }}"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Batal</a>
                    </div>
                </div>



            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const partUsedSection = document.getElementById('part-used-section');
            const addPartUsedBtn = document.getElementById('add-part-used');

            function addPartUsedField() {
                const index = partUsedSection.querySelectorAll('.part-used-item').length;
                const partUsedItem = document.createElement('div');
                partUsedItem.classList.add('flex', 'mb-4', 'part-used-item');

                partUsedItem.innerHTML = `
            <input type="text" name="partUsed[${index}][part]" placeholder="Part"
                class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mr-2" />
            <input type="text" name="partUsed[${index}][usage]" placeholder="Usage"
                class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            <button type="button" class="remove-part-used bg-red-500 text-white rounded px-2 py-1 ml-2">Remove</button>
        `;

                // Add event listener for the remove button on the new item
                partUsedItem.querySelector('.remove-part-used').addEventListener('click', function() {
                    partUsedItem.remove();
                });

                // Insert the new item before the "Add Part Used" button
                partUsedSection.insertBefore(partUsedItem, addPartUsedBtn);
            }

            // Event listener for the "Add Part Used" button
            addPartUsedBtn.addEventListener('click', addPartUsedField);

            // Add event listeners to existing "Remove" buttons (for fields already present in the HTML)
            const existingRemoveButtons = partUsedSection.querySelectorAll('.remove-part-used');
            existingRemoveButtons.forEach(button => {
                button.addEventListener('click', function() {
                    button.parentElement.remove();
                });
            });
        });
    </script>
@endsection
