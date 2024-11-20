@extends('layouts.app')

@section('title', 'Daftar Kegiatan')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6 text-center">Daftar Kegiatan</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse($events as $event)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            @if($event->image)
            <img src="{{ asset('storage/images/events/' . $event->image) }}" alt="{{ $event->title }}" class="w-full h-48 object-cover">
            @else
            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                <span class="text-gray-500">Tidak Ada Gambar</span>
            </div>
            @endif
            <div class="p-4">
                <h2 class="text-xl font-bold">{{ $event->title }}</h2>
                <p class="text-gray-600 mt-2">{{ Str::limit($event->description, 100) }}</p>
                <p class="text-sm text-gray-500 mt-4"><strong>Lokasi:</strong> {{ $event->location }}</p>
                <p class="text-sm text-gray-500"><strong>Waktu:</strong> {{ $event->date }} {{ $event->time }}</p>
            </div>
        </div>
        @empty
        <p class="text-center text-gray-500">Belum ada kegiatan yang tersedia.</p>
        @endforelse
    </div>
    <div class="mt-6">
        {{ $events->links() }} <!-- Pagination -->
    </div>
</div>
@endsection
