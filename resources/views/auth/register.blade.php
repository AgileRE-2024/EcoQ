@extends('layouts.app')
@section('content')
    @push('styles')
        <style>
            /* Existing animations */
            @keyframes float {
                0% {
                    transform: translateY(0px) rotate(0deg);
                }

                50% {
                    transform: translateY(-10px) rotate(5deg);
                }

                100% {
                    transform: translateY(0px) rotate(0deg);
                }
            }

            @keyframes blob {
                0% {
                    transform: translate(0px, 0px) scale(1);
                }

                33% {
                    transform: translate(30px, -50px) scale(1.1);
                }

                66% {
                    transform: translate(-20px, 20px) scale(0.9);
                }

                100% {
                    transform: translate(0px, 0px) scale(1);
                }
            }

            /* New animations */
            @keyframes shimmer {
                0% {
                    background-position: -1000px 0;
                }

                100% {
                    background-position: 1000px 0;
                }
            }

            .input-shimmer {
                background: linear-gradient(to right,
                        rgba(255, 255, 255, 0) 0%,
                        rgba(255, 255, 255, 0.8) 50%,
                        rgba(255, 255, 255, 0) 100%);
                background-size: 1000px 100%;
                animation: shimmer 2s infinite;
            }

            .floating-leaf {
                animation: float 3s ease-in-out infinite;
            }

            .animate-blob {
                animation: blob 7s infinite;
            }

            .garden-input {
                background-color: rgba(255, 255, 255, 0.9);
                backdrop-filter: blur(5px);
                transition: all 0.3s ease;
            }

            .garden-input:focus {
                transform: translateY(-2px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            }

            .glass-effect {
                background: rgba(255, 255, 255, 0.8);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.3);
                box-shadow:
                    0 8px 32px 0 rgba(31, 38, 135, 0.07),
                    inset 0 0 0 1px rgba(255, 255, 255, 0.1);
            }

            .garden-input::placeholder {
                opacity: 0.5;
            }

            .garden-input:focus {
                transform: translateY(-1px);
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            }

            .form-group:hover label {
                color: #059669;
                transition: color 0.3s ease;
            }
        </style>
    @endpush

    {{-- Main Container with proper spacing for navbar --}}
    <div class="min-h-screen pt-20 pb-16"> {{-- Added pt-20 for navbar space --}}
        {{-- Background Blobs --}}
        <div class="fixed inset-0 pointer-events-none overflow-hidden">
            <div
                class="absolute top-1/4 left-1/4 w-64 h-64 bg-green-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob">
            </div>
            <div
                class="absolute top-1/3 right-1/4 w-64 h-64 bg-yellow-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
            </div>
            <div
                class="absolute bottom-1/4 left-1/3 w-64 h-64 bg-pink-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000">
            </div>
        </div>

        {{-- Registration Form Container --}}
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto">
                <div class="glass-effect p-8 rounded-3xl shadow-xl relative overflow-hidden">
                    {{-- Logo and Title Section --}}
                    <div class="text-center mb-8">
                        <img class="mx-auto h-20 w-auto floating-leaf" src="{{ asset('assets/images/logo.png') }}"
                            alt="Logo">
                        <h2 class="mt-6 text-3xl font-bold text-green-800">
                            Join Our Garden Paradise
                        </h2>
                        <p class="mt-2 text-sm text-green-600">
                            Create your account and start growing with us
                        </p>
                    </div>

                    {{-- Error Messages --}}
                    @if ($errors->any())
                        <div class="mb-6 bg-red-100/80 backdrop-blur border-l-4 border-red-500 text-red-700 p-4 rounded-lg">
                            <p class="font-bold">Please check the following:</p>
                            <ul class="mt-2 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Registration Form --}}
                    <form action="{{ route('register') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="bg-white/50 backdrop-blur p-8 rounded-xl space-y-6 shadow-inner">
                            <div class="form-group relative">
                                <label for="name" class="block text-sm font-medium text-green-800 mb-2">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        Full Name
                                    </span>
                                </label>
                                <input type="text" id="name" name="name" required
                                    placeholder="Enter your full name"
                                    class="garden-input mt-1 block w-full px-4 py-3 rounded-lg border-0 ring-1 ring-green-100 focus:ring-2 focus:ring-green-500 transition-all duration-300 hover:ring-green-200 placeholder:text-green-500">
                            </div>

                            <div class="form-group relative">
                                <label for="email" class="block text-sm font-medium text-green-800 mb-2">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                        Email Address
                                    </span>
                                </label>
                                <input type="email" id="email" name="email" required
                                    placeholder="Enter your email address"
                                    class="garden-input mt-1 block w-full px-4 py-3 rounded-lg border-0 ring-1 ring-green-100 focus:ring-2 focus:ring-green-500 transition-all duration-300 hover:ring-green-200 placeholder:text-green-300">
                            </div>

                            <div class="form-group relative">
                                <label for="password" class="block text-sm font-medium text-green-800 mb-2">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                        Password
                                    </span>
                                </label>
                                <input type="password" id="password" name="password" required
                                    placeholder="Create a strong password"
                                    class="garden-input mt-1 block w-full px-4 py-3 rounded-lg border-0 ring-1 ring-green-100 focus:ring-2 focus:ring-green-500 transition-all duration-300 hover:ring-green-200 placeholder:text-green-300">
                            </div>

                            <div class="form-group relative">
                                <label for="password_confirmation" class="block text-sm font-medium text-green-800 mb-2">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                        Confirm Password
                                    </span>
                                </label>
                                <input type="password" id="password_confirmation" name="password_confirmation" required
                                    placeholder="Confirm your password"
                                    class="garden-input mt-1 block w-full px-4 py-3 rounded-lg border-0 ring-1 ring-green-100 focus:ring-2 focus:ring-green-500 transition-all duration-300 hover:ring-green-200 placeholder:text-green-300">
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full py-4 px-6 rounded-xl text-white bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg font-medium text-lg">
                            <span class="flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Create Account
                            </span>
                        </button>

                        <p class="text-center text-sm text-green-600">
                            Already have an account?
                            <a href="{{ route('login') }}"
                                class="font-medium text-green-600 hover:text-green-500 transition-colors duration-300 border-b border-green-300 hover:border-green-500">
                                Sign in
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
