@extends('dashboard.layouts.template')

@section('content')
    <div class="bg-gradient-to-br from-green-50 to-emerald-100 flex-1 p-6 min-h-screen">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white rounded-xl shadow-sm p-8">
                <div class="max-w-7xl mx-auto">
                    <!-- Breadcrumb -->
                    <nav class="mb-6" aria-label="Breadcrumb">
                        <ol class="flex items-center space-x-2 text-sm">
                            <li class="flex items-center">
                                <a href="{{ route('dashboard') }}"
                                    class="text-green-600 hover:text-green-800 flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    Dashboard
                                </a>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 5l7 7-7 7" />
                                </svg>
                                <a href="{{ route('gardens.index') }}"
                                    class="text-green-600 hover:text-green-800 ml-2">Gardens</a>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 5l7 7-7 7" />
                                </svg>
                                <span class="ml-2 text-green-800">Create Garden</span>
                            </li>
                        </ol>
                    </nav>

                    <!-- Header Content -->
                    <div class="flex flex-col space-y-8 mb-6">
                        <div>
                            <h1 class="text-4xl font-bold text-green-800 tracking-tight">Create New Garden</h1>
                            <p class="mt-2 text-base text-green-600">Register a new garden to your profile</p>
                        </div>
                    </div>

                    <!-- Garden Creation Form -->
                    <form action="{{ route('gardens.store') }}" method="POST" enctype="multipart/form-data"
                        x-data="{ previewUrl: null }">
                        @csrf



                        <!-- User Information Section -->
                        <div
                            class="bg-gradient-to-br from-green-50 to-emerald-100 rounded-xl p-8 mb-8 shadow-lg relative overflow-hidden">

                            <h2 class="text-2xl font-semibold text-green-800 mb-6 relative">
                                Garden Owner Information
                                <span class="absolute bottom-0 left-0 w-20 h-1 bg-green-500 rounded-full"></span>
                            </h2>
                            <div
                                class="absolute top-0 right-0 w-40 h-40 bg-green-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob">
                            </div>
                            <div
                                class="absolute top-2 left-0 w-24 h-24 bg-emerald-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Name -->
                                <div>
                                    <label for="name" class="block text-sm font-medium text-green-700 mb-2">
                                        Full Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="name" id="name" required
                                        class="w-full px-4 py-2 rounded-lg border-2 border-green-200 focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200 bg-white bg-opacity-80"
                                        placeholder="Enter full name">
                                </div>

                                <!-- Email -->
                                <div>
                                    <label for="email" class="block text-sm font-medium text-green-700 mb-2">
                                        Email Address <span class="text-red-500">*</span>
                                    </label>
                                    <input type="email" name="email" id="email" required
                                        class="w-full px-4 py-2 rounded-lg border-2 border-green-200 focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200 bg-white bg-opacity-80"
                                        placeholder="Enter email address">
                                </div>

                                <!-- Password -->
                                <div>
                                    <label for="password" class="block text-sm font-medium text-green-700 mb-2">
                                        Password <span class="text-red-500">*</span>
                                    </label>
                                    <input type="password" name="password" id="password" required
                                        class="w-full px-4 py-2 rounded-lg border-2 border-green-200 focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200 bg-white bg-opacity-80"
                                        placeholder="Create a strong password">
                                </div>

                                <!-- Confirm Password -->
                                <div>
                                    <label for="password_confirmation"
                                        class="block text-sm font-medium text-green-700 mb-2">
                                        Confirm Password <span class="text-red-500">*</span>
                                    </label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" required
                                        class="w-full px-4 py-2 rounded-lg border-2 border-green-200 focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200 bg-white bg-opacity-80"
                                        placeholder="Re-enter the password">
                                </div>

                                <!-- Phone -->
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-green-700 mb-2">
                                        Phone Number
                                    </label>
                                    <input type="tel" name="phone" id="phone"
                                        class="w-full px-4 py-2 rounded-lg border-2 border-green-200 focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200 bg-white bg-opacity-80"
                                        placeholder="Enter phone number">
                                </div>
                                <!-- Date of Birth -->
                                <div>
                                    <label for="date_of_birth" class="block text-sm font-medium text-green-700 mb-2">
                                        Date of Birth
                                    </label>
                                    <input type="date" name="date_of_birth" id="date_of_birth"
                                        class="w-full px-4 py-2 rounded-lg border-2 border-green-200 focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200 bg-white bg-opacity-80">
                                </div>

                                <!-- Address -->
                                <div class="md:col-span-2">
                                    <label for="address" class="block text-sm font-medium text-green-700 mb-2">
                                        Address
                                    </label>
                                    <textarea name="address" id="address" rows="3"
                                        class="w-full px-4 py-2 rounded-lg border-2 border-green-200 focus:border-green-500 focus:ring focus:ring-green-200 transition duration-200 bg-white bg-opacity-80 resize-none"
                                        placeholder="Enter full address"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end mt-8">
                            <button type="submit"
                                class="px-8 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition duration-300 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Create Garden Owner
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
