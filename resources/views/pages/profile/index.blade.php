@extends('layouts.app')
@section('content')
    <div class="min-h-screen bg-gradient-to-br from-green-50 via-emerald-50/50 to-teal-50/30 pt-28">
        <!-- Profile Header Section -->
        <div class="container mx-auto px-4">
            <div
                class="relative bg-gradient-to-r from-green-600 to-emerald-600 rounded-3xl p-8 shadow-xl overflow-hidden mb-8">
                <!-- Decorative Elements -->
                <div class="absolute inset-0 overflow-hidden pointer-events-none">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2">
                    </div>
                    <div
                        class="absolute bottom-0 left-0 w-64 h-64 bg-black/10 rounded-full translate-y-1/2 -translate-x-1/2">
                    </div>
                </div>

                <div class="relative z-10 flex flex-col md:flex-row items-center gap-8">
                    <!-- Profile Image -->
                    <div class="relative group">
                        <div class="w-32 h-32 rounded-2xl overflow-hidden ring-4 ring-white/20 shadow-2xl">
                            <img src="{{ $user->image ? asset('storage/images/users/' . $user->image) : asset('assets/images/default.png') }}"
                                alt="{{ $user->name }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <button
                            class="absolute bottom-2 right-2 p-2 bg-white/20 backdrop-blur-sm rounded-full 
                                 hover:bg-white/30 transition-colors duration-300">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </button>
                    </div>

                    <!-- Profile Info -->
                    <div class="text-center md:text-left">
                        <h1 class="text-3xl font-bold text-white mb-2">{{ $user->name }}</h1>
                        <p class="text-green-100 text-lg">{{ ucfirst($user->role) }}</p>
                        <div class="mt-4 flex flex-wrap gap-4 justify-center md:justify-start">
                            <span class="px-4 py-1.5 bg-white/10 backdrop-blur-sm rounded-full text-sm text-white">
                                Joined {{ $user->created_at->diffForHumans() }}
                            </span>
                            @if ($user->email_verified_at)
                                <span
                                    class="px-4 py-1.5 bg-emerald-500/20 backdrop-blur-sm rounded-full text-sm text-white 
                                   flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Verified Account
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Details Section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <!-- Personal Information Card -->
                <div class="md:col-span-2 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="p-2 bg-green-100 rounded-lg">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-800">Personal Information</h2>
                        </div>

                        <div class="space-y-6">
                            <!-- Email -->
                            <div class="flex items-center gap-4">
                                <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-green-50">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-500">Email</p>
                                    <p class="text-gray-800">{{ $user->email }}</p>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="flex items-center gap-4">
                                <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-green-50">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-500">Phone</p>
                                    <p class="text-gray-800">{{ $user->phone ?? 'Not provided' }}</p>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="flex items-center gap-4">
                                <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-green-50">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-500">Address</p>
                                    <p class="text-gray-800">{{ $user->address ?? 'Not provided' }}</p>
                                </div>
                            </div>

                            <!-- Date of Birth -->
                            <div class="flex items-center gap-4">
                                <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-green-50">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-500">Date of Birth</p>
                                    <p class="text-gray-800">
                                        {{ $user->date_of_birth ? $user->date_of_birth->format('F d, Y') : 'Not provided' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Button -->
                        <div class="mt-8 flex justify-end">
                            <a href="{{ route('profile.edit') }}"
                                class="px-6 py-2.5 bg-green-600 text-white rounded-xl hover:bg-green-700 
                                  transition-colors duration-300 flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit Profile
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Account Settings Card -->
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="p-2 bg-green-100 rounded-lg">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-800">Account Settings</h2>
                        </div>

                        <div class="space-y-4">
                            <!-- Change Password Link -->
                            <a href=""
                                class="block p-4 rounded-xl hover:bg-green-50 transition-colors duration-300">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                        <span class="text-gray-700">Change Password</span>
                                    </div>
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </a>

                            <!-- Privacy Settings Link -->
                            <a href=""
                                class="block p-4 rounded-xl hover:bg-green-50 transition-colors duration-300">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                                        </svg>
                                        <span class="text-gray-700">Privacy Settings</span>
                                    </div>
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </a>

                            <!-- Notifications Settings Link -->
                            <a href=""
                                class="block p-4 rounded-xl hover:bg-green-50 transition-colors duration-300">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                        </svg>
                                        <span class="text-gray-700">Notification Preferences</span>
                                    </div>
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </a>

                            <!-- Two-Factor Authentication Link -->
                            <a href=""
                                class="block p-4 rounded-xl hover:bg-green-50 transition-colors duration-300">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                        <span class="text-gray-700">Two-Factor Authentication</span>
                                    </div>
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </a>

                            <!-- Account Deactivation Link -->
                            <button onclick="confirmDeactivation()"
                                class="w-full p-4 rounded-xl hover:bg-red-50 transition-colors duration-300">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        <span class="text-red-600">Deactivate Account</span>
                                    </div>
                                    <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Section -->
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 mb-8">
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="p-2 bg-green-100 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-800">Recent Activity</h2>
                        {{-- @if (count($activities) > 0)
                            <div class="space-y-4">
                                @foreach ($activities as $activity)
                                    <div
                                        class="flex items-center gap-4 p-4 rounded-xl hover:bg-gray-50 transition-colors duration-300">
                                        <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-green-50">
                                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                {!! $activity->icon !!}
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-gray-800">{{ $activity->description }}</p>
                                            <p class="text-sm text-gray-500">{{ $activity->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8">
                                <p class="text-gray-500">No recent activity to show</p>
                            </div>
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Deactivation Confirmation Modal -->
    <script>
        function confirmDeactivation() {
            if (confirm('Are you sure you want to deactivate your account? This action cannot be undone.')) {
                window.location.href = "";
            }
        }
    </script>
@endsection
