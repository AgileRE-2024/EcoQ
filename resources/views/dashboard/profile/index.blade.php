@extends('dashboard.layouts.template')

@section('content')
    <div class="bg-gray-100 min-h-screen p-5 flex items-center justify-center">
        <div class="max-w-4xl w-full bg-white p-8 rounded-lg shadow-lg">
            <!-- Profile Header -->
            <div class="flex items-center space-x-8">
                <img src="{{ $user->avatar ? asset('storage/avatars/' . $user->avatar) : 'https://via.placeholder.com/150' }}"
                    alt="User Avatar" class="w-24 h-24 rounded-full object-cover border-4 border-indigo-600">
                <div>
                    <h2 class="text-2xl font-semibold text-gray-800">{{ $user->name }}</h2>
                    <p class="text-sm text-gray-600 capitalize">{{ $user->role }}</p>
                    <p class="text-sm text-gray-600">{{ $user->email }}</p>
                </div>
            </div>

            <!-- Garden Information (if role is garden_owner) -->
            @if ($user->role == 'garden_owner' && $garden)
                <div class="mt-8">
                    <h3 class="text-xl font-semibold text-gray-800">Garden Information</h3>
                    <div class="mt-4 space-y-2">
                        <p class="text-sm text-gray-600"><strong>Name:</strong> {{ $garden->name }}</p>
                        <p class="text-sm text-gray-600"><strong>Location:</strong> {{ $garden->location }}</p>
                        <p class="text-sm text-gray-600"><strong>Description:</strong> {{ $garden->description }}</p>
                    </div>
                </div>
            @endif

            <!-- Edit Button for Profile -->
            <div class="mt-8 text-right">
                <a href="{{ route('profile.edit') }}"
                    class="bg-indigo-600 hover:bg-indigo-800 text-white font-semibold py-2 px-4 rounded-md transition duration-200 transform hover:scale-105">
                    Edit Profile
                </a>
            </div>
        </div>
    </div>
@endsection
