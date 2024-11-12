@extends('dashboard.layouts.template')

@section('content')
    <div class="bg-gray-100 flex-1 p-5 md:mt-10">
        <div class="mx-auto px-4">
            <h1 class="text-3xl font-semibold text-gray-800 my-2">All Events</h1>
            <a href="{{ route('events.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Buat Event</a>

            <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Title</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Description</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Date</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Time</th>
                            @if (Auth::user()->role == 'admin')
                                <th class="py-3 px-4 uppercase font-semibold text-sm">Garden</th>
                            @endif
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Location</th>

                            <th class="py-3 px-4 uppercase font-semibold text-sm">Action</th>

                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($events as $event)
                            <tr class="hover:bg-gray-100">

                                <td class="py-3 px-4">{{ $event->title }}</td>
                                <td class="py-3 px-4">{{ $event->description }}</td>
                                <td class="py-3 px-4">{{ $event->date }}</td>
                                <td class="py-3 px-4">{{ $event->time }}</td>
                                @if (Auth::user()->role == 'admin')
                                    <td class="py-3 px-4">{{ $event->garden->name }}</td>
                                @endif
                                <td class="py-3 px-4">{{ $event->location }}</td>
                                <td class="flex items-center justify-center py-3 px-4">
                                    <a href="{{ route('events.show', $event->id) }}"
                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mx-1">View</a>
                                    @if (Auth::user()->role == 'garden_owner')
                                        <a href="{{ route('events.edit', $event->id) }}"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-1">Edit</a>
                                        <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                            class="inline-block"
                                            onsubmit="return confirm('Are you sure you want to delete this event?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mx-1">Delete</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
            <div class="mt-4">
                {{ $events->links() }}
            </div>
        </div>
    </div>
@endsection
