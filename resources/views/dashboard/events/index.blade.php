@extends('dashboard.layouts.template')

@section('content')
    <div class="bg-gray-100 flex-1 p-5 md:mt-10">
        <div class="mx-auto px-4">
            <h1 class="text-3xl font-semibold text-gray-800 my-2">All Events</h1>
            <a href="{{ route('events.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Buat Event</a>

            <div class="bg-white shadow-md rounded my-6 overflow-x-auto">

            </div>

            <!-- Pagination Links -->
            <div class="mt-4">
                {{ $events->links() }}
            </div>
        </div>
    </div>
@endsection
