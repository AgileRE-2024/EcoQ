@extends('dashboard.layouts.template')

@section('content')
    <div class="bg-gray-100 flex-1 p-6 md:mt-16">
        <div class="mx-auto px-4">
            <a href="{{ route('events.index') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fad fa-arrow-left"></i> Back
            </a>
            <h1 class="text-2xl font-bold mx-4 my-4">Event Details</h1>

            <div class="bg-white shadow-md rounded my-6 overflow-x-auto p-4">
                <h2 class="text-xl font-bold mb-4">{{ $event->name }}</h2>
                @if (Auth::user()->role == 'admin')
                    <p><strong>Organizer:</strong> {{ $event->garden->name ?? 'N/A' }}</p>
                @endif
                <p><strong>Description:</strong> {{ $event->description ?? 'N/A' }}</p>
                <p><strong>Location:</strong> {{ $event->location ?? 'N/A' }}</p>
                <p><strong>Date:</strong> {{ $event->date ?? 'N/A' }}</p>
                <p><strong>Time:</strong> {{ $event->time ?? 'N/A' }}</p>

            </div>
        </div>
    </div>
@endsection
