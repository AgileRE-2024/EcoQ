@extends('dashboard.layouts.template')

@section('content')
    <div class="bg-gray-100 flex-1 p-5 md:mt-10">
        <div class="mx-auto px-4">
            <h1 class="text-3xl font-semibold text-gray-800 my-2">All Plants</h1>
            <a href="{{ route('plants.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Tanaman</a>

            <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Image</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Nama Tanaman</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Deskripsi</th>
                            @if (Auth::user()->role == 'admin')
                                <th class="py-3 px-4 uppercase font-semibold text-sm">Garden</th>
                            @endif

                            <th class="py-3 px-4 uppercase font-semibold text-sm">Habitat</th>
                            <th class="py-3 px-4 uppercase font-semibold text-sm">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($plants as $plant)
                            <tr class="hover:bg-gray-100">
                                <td class="py-3 px-4">
                                    <img src="{{ $plant->image ? asset('storage/images/plants/' . $plant->image) : asset('assets/images/plant.jpeg') }}"
                                        alt="{{ $plant->name }}" class="w-32 h-32 object-cover rounded">
                                </td>
                                <td class="py-3 px-4">{{ $plant->name }}</td>
                                <td class="py-3 px-4">{{ $plant->description }}</td>
                                @if (Auth::user()->role == 'admin')
                                    <td class="py-3 px-4">{{ $plant->garden->name }}</td>
                                @endif
                                <td class="py-3 px-4">{{ $plant->habitat }}</td>
                                <td class="flex items-center justify-center py-3 px-4">
                                    <a href="{{ route('plants.show', $plant->id) }}"
                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mx-1">View</a>
                                    <a href="{{ route('plants.edit', $plant->id) }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-1">Edit</a>
                                    <form action="{{ route('plants.destroy', $plant->id) }}" method="POST"
                                        class="inline-block"
                                        onsubmit="return confirm('Are you sure you want to delete this plant?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mx-1">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
            <div class="mt-4">
                {{ $plants->links() }}
            </div>
        </div>
    </div>
@endsection
