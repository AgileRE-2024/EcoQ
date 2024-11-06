@extends('dashboard.layouts.template')

@section('content')
    <div class="bg-gray-100 flex-1 p-6 md:mt-16">
        <div class="mx-auto px-4">
            <a href="{{ route('plants.index') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fad fa-arrow-left"></i> Back
            </a>
            <h1 class="text-2xl font-bold mx-4 my-4">Plant Details</h1>

            <div class="bg-white shadow-md rounded my-6 overflow-x-auto p-4">
                @if ($plant->image)
                    <div class="my-4 text-center">
                        <img src="{{ asset('storage/images/plants/' . $plant->image) }}" alt="{{ $plant->name }}"
                            class="w-64 h-auto rounded">
                    </div>
                @endif
                <h2 class="text-xl font-bold mb-4">{{ $plant->name }}</h2>
                <p><strong>Common Name:</strong> {{ $plant->common_name ?? 'N/A' }}</p>
                <p><strong>Scientific Name:</strong> {{ $plant->scientific_name ?? 'N/A' }}</p>
                <p><strong>Description:</strong> {{ $plant->description ?? 'N/A' }}</p>
                <p><strong>Habitat:</strong> {{ $plant->habitat ?? 'N/A' }}</p>
                <p><strong>Chemical Compounds:</strong> {{ $plant->chemical_compounds ?? 'N/A' }}</p>

                <!-- Plant Images -->

                @if ($plant->qr_image)
                    <div class="my-4">
                        <img src="{{ asset('storage/' . $plant->qr_image) }}" alt="QR Code" class="w-32 h-auto rounded">
                    </div>
                @endif

                <!-- Classification -->
                <h3 class="text-lg font-semibold mt-6">Classification</h3>
                <p><strong>Kingdom:</strong> {{ $plant->classification->kingdom ?? 'N/A' }}</p>
                <p><strong>Division:</strong> {{ $plant->classification->division ?? 'N/A' }}</p>
                <p><strong>Class:</strong> {{ $plant->classification->class ?? 'N/A' }}</p>
                <p><strong>Order:</strong> {{ $plant->classification->order ?? 'N/A' }}</p>
                <p><strong>Family:</strong> {{ $plant->classification->family ?? 'N/A' }}</p>
                <p><strong>Genus:</strong> {{ $plant->classification->genus ?? 'N/A' }}</p>
                <p><strong>Species:</strong> {{ $plant->classification->species ?? 'N/A' }}</p>

                <!-- Pharmacological Aspects -->
                <h3 class="text-lg font-semibold mt-6">Pharmacological Aspects</h3>
                <p><strong>Toxicity:</strong> {{ $plant->pharmocology_aspect->toxicity ?? 'N/A' }}</p>
                <p><strong>Contraindications:</strong> {{ $plant->pharmocology_aspect->contraindications ?? 'N/A' }}</p>
                <p><strong>Warnings:</strong> {{ $plant->pharmocology_aspect->warnings ?? 'N/A' }}</p>
                <p><strong>Precautions:</strong> {{ $plant->pharmocology_aspect->precautions ?? 'N/A' }}</p>
                <p><strong>Side Effects:</strong> {{ $plant->pharmocology_aspect->side_effects ?? 'N/A' }}</p>

                <!-- Parts Used -->
                <h3 class="text-lg font-semibold mt-6">Parts Used</h3>
                @if ($plant->partUsed->isNotEmpty())
                    <ul class="list-disc pl-5">
                        @foreach ($plant->partUsed as $part_used)
                            <li><strong>Part:</strong> {{ $part_used->part }} - <strong>Usage:</strong>
                                {{ $part_used->usage }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>N/A</p>
                @endif
            </div>
        </div>
    </div>
@endsection
