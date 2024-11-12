@extends('dashboard.layouts.template')

@section('content')
    <div class="bg-gray-100 flex-1 p-6 md:mt-16">
        <div class="mx-auto px-4">
            <a href="{{ route('events.index') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fad fa-arrow-left"></i> Back
            </a>
            <h1 class="text-2xl font-bold my-4">Add New Event</h1>

            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-6" role="alert">
                    <p class="font-bold">Error</p>
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div class="bg-white shadow-md rounded my-6 overflow-x-auto p-4">
                <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <h2 class="text-xl font-bold mb-4">Basic Information</h2>

                    <!-- Title -->
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                        <input type="text" name="title" id="title"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Event Title">
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                        <textarea name="description" id="description"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Event Description"></textarea>
                    </div>

                    <!-- Date -->
                    <div class="mb-4">
                        <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date</label>
                        <input type="date" name="date" id="date"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <!-- Time -->
                    <div class="mb-4">
                        <label for="time" class="block text-gray-700 text-sm font-bold mb-2">Time</label>
                        <input type="time" name="time" id="time"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <!-- Location -->
                    <div class="mb-4">
                        <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location</label>
                        <input type="text" name="location" id="location"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Event Location">
                    </div>

                    <!-- Garden ID (Hidden) -->
                    <input type="hidden" name="garden_id" value="{{ Auth::user()->garden->id }}">

                    <!-- Submit Button -->
                    <div class="my-4">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Event
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
