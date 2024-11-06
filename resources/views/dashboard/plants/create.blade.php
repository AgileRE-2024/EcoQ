@extends('dashboard.layouts.template')

@section('content')
    <div class="bg-gray-100 flex-1 p-6 md:mt-16">
        <div class="mx-auto px-4">
            <a href="{{ route('plants.index') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fad fa-arrow-left"></i> Back
            </a>
            <h1 class="text-2xl font-bold my-4">Add New Plant</h1>

            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-6" role="alert">
                    <p class="font-bold">Error</p>
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div class="bg-white shadow-md rounded my-6 overflow-x-auto p-4">
                <form action="{{ route('plants.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <h2 class="text-xl font-bold mb-4">Basic Information</h2>



                    <!-- Name -->
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                        <input type="text" name="name" id="name"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Name">
                    </div>

                    <!-- Common Name -->
                    <div class="mb-4">
                        <label for="common_name" class="block text-gray-700 text-sm font-bold mb-2">Common Name</label>
                        <input type="text" name="common_name" id="common_name"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Common Name">
                    </div>

                    <!-- Scientific Name -->
                    <div class="mb-4">
                        <label for="scientific_name" class="block text-gray-700 text-sm font-bold mb-2">Scientific
                            Name</label>
                        <input type="text" name="scientific_name" id="scientific_name"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Scientific Name">
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                        <textarea name="description" id="description"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Description"></textarea>
                    </div>

                    <!-- Habitat -->
                    <div class="mb-4">
                        <label for="habitat" class="block text-gray-700 text-sm font-bold mb-2">Habitat</label>
                        <input type="text" name="habitat" id="habitat"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Habitat">
                    </div>

                    <!-- Chemical Compounds -->
                    <div class="mb-4">
                        <label for="chemical_compounds" class="block text-gray-700 text-sm font-bold mb-2">Chemical
                            Compounds</label>
                        <input type="text" name="chemical_compounds" id="chemical_compounds"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Chemical Compounds">
                    </div>

                    <!-- Plant Image -->
                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                        <input type="file" name="image" id="image"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <!-- Classification Information -->
                    <h2 class="text-xl font-bold mt-8 mb-4">Classification</h2>

                    <div class="mb-4">
                        <label for="kingdom" class="block text-gray-700 text-sm font-bold mb-2">Kingdom</label>
                        <input type="text" name="kingdom" id="kingdom"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Kingdom">
                    </div>
                    <div class="mb-4">
                        <label for="division" class="block text-gray-700 text-sm font-bold mb-2">Division</label>
                        <input type="text" name="division" id="division"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Division">
                    </div>

                    <div class="mb-4">
                        <label for="class" class="block text-gray-700 text-sm font-bold mb-2">Class</label>
                        <input type="text" name="class" id="class"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Class">
                    </div>

                    <div class="mb-4">
                        <label for="order" class="block text-gray-700 text-sm font-bold mb-2">Order</label>
                        <input type="text" name="order" id="order"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Order">
                    </div>

                    <div class="mb-4">
                        <label for="family" class="block text-gray-700 text-sm font-bold mb-2">Family</label>
                        <input type="text" name="family" id="family"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Family">
                    </div>

                    <div class="mb-4">
                        <label for="genus" class="block text-gray-700 text-sm font-bold mb-2">Genus</label>
                        <input type="text" name="genus" id="genus"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Genus">
                    </div>

                    <div class="mb-4">
                        <label for="species" class="block text-gray-700 text-sm font-bold mb-2">Species</label>
                        <input type="text" name="species" id="species"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Species">
                    </div>

                    <h2 class="text-xl font-bold mt-8 mb-4">Pharmacology Aspects</h2>
                    <div class="mb-4">
                        <label for="toxicity" class="block text-gray-700 text-sm font-bold mb-2">Toxicity</label>
                        <textarea name="toxicity" id="toxicity"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Toxicity"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="contraindications"
                            class="block text-gray-700 text-sm font-bold mb-2">Contraindications</label>
                        <textarea name="contraindications" id="contraindications"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Contraindications"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="side_effects" class="block text-gray-700 text-sm font-bold mb-2">Side Effects</label>
                        <textarea name="side_effects" id="side_effects"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Side Effects"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="warnings" class="block text-gray-700 text-sm font-bold mb-2">Interactions</label>
                        <textarea name="warnings" id="warnings"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Interactions"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="precautions" class="block text-gray-700 text-sm font-bold mb-2">Precautions</label>
                        <textarea name="precautions" id="precautions"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Precautions"></textarea>
                    </div>
                    <!-- Dynamic Input for Part Used -->
                    <h2 class="text-xl font-bold mt-8 mb-4">Parts Used</h2>

                    <div id="part-used-section">
                        <div class="part-used-group mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Part</label>
                            <input type="text" name="parts[0][part]"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="Part">
                            <label class="block text-gray-700 text-sm font-bold mt-2 mb-2">Usage</label>
                            <input type="text" name="parts[0][usage]"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="Usage">
                        </div>
                    </div>



                    <button type="button" onclick="addPartUsed()"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Part
                        Used</button>

                    <!-- Garden ID (Hidden) -->
                    <input type="hidden" name="garden_id" value="{{ Auth::user()->garden->id }}">

                    <!-- Submit Button -->
                    <div class="my-4">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Plant
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        let partUsedIndex = 1;

        function addPartUsed() {
            const partUsedSection = document.getElementById('part-used-section');
            const newPartGroup = document.createElement('div');
            newPartGroup.classList.add('part-used-group', 'mb-4');
            newPartGroup.innerHTML = `
                <label class="block text-gray-700 text-sm font-bold mb-2">Part</label>
                <input type="text" name="parts[${partUsedIndex}][part]" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Part">
                <label class="block text-gray-700 text-sm font-bold mt-2 mb-2">Usage</label>
                <input type="text" name="parts[${partUsedIndex}][usage]" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Usage">
            `;
            partUsedSection.appendChild(newPartGroup);
            partUsedIndex++;
        }
    </script>
@endsection
