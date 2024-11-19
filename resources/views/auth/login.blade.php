@extends('layouts.app')
@section('content')
    @push('styles')
        <style>
            body {
                font-family: 'Poppins', sans-serif;
                background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M54.627,25.6c0,0-20.8-21.6-42.667,0C11.96,25.6-8.84,47.2,12.627,47.2s41.6-21.6,41.6-21.6' style='fill:none;stroke:%2386efac;stroke-width:2;stroke-opacity:0.2'/%3E%3C/svg%3E");
            }

            @keyframes float {
                0% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-10px);
                }

                100% {
                    transform: translateY(0px);
                }
            }

            .floating-leaf {
                animation: float 3s ease-in-out infinite;
            }

            .garden-input {
                background-color: rgba(255, 255, 255, 0.9);
                backdrop-filter: blur(5px);
            }

            .glass-effect {
                background: rgba(255, 255, 255, 0.8);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.3);
            }

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

            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes gradientFlow {
                0% {
                    background-position: 0% 50%;
                }

                50% {
                    background-position: 100% 50%;
                }

                100% {
                    background-position: 0% 50%;
                }
            }

            .decorative-leaf {
                position: absolute;
                opacity: 0.2;
                z-index: -1;
            }

            .leaf-1 {
                animation: float 6s ease-in-out infinite;
                top: 10%;
                left: 5%;
            }

            .leaf-2 {
                animation: float 7s ease-in-out infinite 1s;
                top: 20%;
                right: 5%;
            }

            .leaf-3 {
                animation: float 5s ease-in-out infinite 0.5s;
                bottom: 10%;
                left: 10%;
            }

            .leaf-4 {
                animation: float 8s ease-in-out infinite 1.5s;
                bottom: 20%;
                right: 10%;
            }

            .animated-gradient {
                background: linear-gradient(270deg, #22c55e, #059669, #047857);
                background-size: 200% 200%;
                animation: gradientFlow 6s ease infinite;
            }

            .login-card {
                animation: fadeInUp 0.8s ease-out;
            }

            .input-focus-effect:focus {
                transform: scale(1.02);
                transition: transform 0.3s ease;
            }

            .hoverable-button {
                transition: all 0.3s ease;
            }

            .hoverable-button:hover {
                transform: translateY(-3px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            }

            @keyframes ripple {
                0% {
                    transform: scale(1);
                    opacity: 1;
                }

                100% {
                    transform: scale(1.5);
                    opacity: 0;
                }
            }

            @keyframes shine {
                0% {
                    background-position: 200% center;
                }

                100% {
                    background-position: -200% center;
                }
            }

            .input-shine {
                background: linear-gradient(90deg,
                        rgba(255, 255, 255, 0) 0%,
                        rgba(255, 255, 255, 0.8) 50%,
                        rgba(255, 255, 255, 0) 100%);
                background-size: 200% 100%;
                animation: shine 3s infinite;
            }

            .ripple-effect::after {
                content: '';
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                border-radius: inherit;
                border: 2px solid currentColor;
                animation: ripple 1.5s infinite;
            }

            .glass-effect {
                background: rgba(255, 255, 255, 0.8);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.3);
                box-shadow:
                    0 8px 32px 0 rgba(31, 38, 135, 0.07),
                    inset 0 0 0 1px rgba(255, 255, 255, 0.1);
            }

            .garden-input:focus {
                animation: input-shine 0.5s ease-in-out;
                box-shadow:
                    0 0 0 2px rgba(34, 197, 94, 0.2),
                    0 0 20px rgba(34, 197, 94, 0.1);
            }

            @keyframes input-shine {
                0% {
                    box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.4);
                }

                100% {
                    box-shadow: 0 0 0 10px rgba(34, 197, 94, 0);
                }
            }
        </style>
    @endpush

    {{-- Main Container with proper spacing --}}
    <div class="min-h-screen pt-20 pb-16">
        {{-- Decorative Leaves --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            {{-- Floating Leaves --}}
            <svg class="decorative-leaf leaf-1 w-24 h-24 text-green-200" viewBox="0 0 24 24">
                <path d="M12 2L8 6V9L4 13V17L8 21H12L16 17V13L20 9V6L16 2H12Z" />
            </svg>
            <svg class="decorative-leaf leaf-2 w-16 h-16 text-emerald-200" viewBox="0 0 24 24">
                <path
                    d="M17 8C8 10 5.9 16.17 3.82 21.34L5.71 22L6.66 19.7C7.14 19.87 7.64 20 8 20C19 20 22 3 22 3C21 5 14 5.25 9 6.25C4 7.25 2 11.5 2 13.5C2 15.5 3.75 17.25 3.75 17.25C7 8 17 8 17 8Z" />
            </svg>
            <svg class="decorative-leaf leaf-3 w-20 h-20 text-green-100" viewBox="0 0 24 24">
                <path d="M12 22C16.97 22 21 17.97 21 13V4C21 4 15.97 2 12 2C8.03 2 3 4 3 4V13C3 17.97 7.03 22 12 22Z" />
            </svg>
            <svg class="decorative-leaf leaf-4 w-28 h-28 text-emerald-100" viewBox="0 0 24 24">
                <path d="M12 22C16.97 22 21 17.97 21 13V4C21 4 15.97 2 12 2C8.03 2 3 4 3 4V13C3 17.97 7.03 22 12 22Z" />
            </svg>

            {{-- Background Pattern --}}
            <div class="absolute inset-0 opacity-5">
                <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60"
                    height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath
                    d="M54.627,25.6c0,0-20.8-21.6-42.667,0C11.96,25.6-8.84,47.2,12.627,47.2s41.6-21.6,41.6-21.6"
                    style="fill:none;stroke:%2322c55e;stroke-width:2;stroke-opacity:0.2"/%3E%3C/svg%3E')"></div>
            </div>
        </div>

        <div class="container mx-auto px-4 py-8">
            <div class="max-w-md mx-auto">
                {{-- Login Card --}}
                <div class="glass-effect p-8 rounded-3xl shadow-xl relative">
                    {{-- Logo and Title --}}
                    <div class="relative mb-8">
                        <img class="mx-auto h-20 w-auto floating-leaf" src="{{ asset('assets/images/logo.png') }}"
                            alt="Logo">
                        <h2 class="mt-4 text-center text-2xl font-bold text-green-800">
                            Welcome to Garden Paradise
                        </h2>
                        <p class="mt-2 text-center text-sm text-green-600">
                            Sign in to your green sanctuary
                        </p>
                    </div>

                    {{-- Alert Messages --}}
                    @if (session('status'))
                        <div
                            class="mb-4 bg-green-100/80 backdrop-blur border-l-4 border-green-500 text-green-700 p-4 rounded-lg">
                            <p class="font-bold">Success</p>
                            <p>{{ session('status') }}</p>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-4 bg-red-100/80 backdrop-blur border-l-4 border-red-500 text-red-700 p-4 rounded-lg">
                            <p class="font-bold">Error</p>
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    {{-- Login Form --}}
                    <form action="{{ route('login') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="rounded-xl shadow-sm bg-white/50 backdrop-blur p-6 space-y-4">
                            <div>
                                <label for="email" class="block text-sm font-medium text-green-900">Email</label>
                                <input type="email" name="email" id="email" required
                                    class="garden-input mt-1 block w-full rounded-lg px-4 py-2 border focus:ring-2 focus:ring-green-500"
                                    placeholder="🌱 Enter your email">
                            </div>
                            <div>
                                <label for="password" class="block text-sm font-medium text-green-900">Password</label>
                                <input type="password" name="password" id="password" required
                                    class="garden-input mt-1 block w-full rounded-lg px-4 py-2 border focus:ring-2 focus:ring-green-500"
                                    placeholder="🔒 Enter your password">
                            </div>
                        </div>

                        {{-- Remember Me & Forgot Password --}}
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input type="checkbox" name="remember" id="remember"
                                    class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                                <label for="remember" class="ml-2 text-sm text-green-700">Remember me</label>
                            </div>
                            <a href="#" class="text-sm text-green-600 hover:text-green-500">Forgot password?</a>
                        </div>

                        {{-- Submit Button --}}
                        <button type="submit"
                            class="w-full py-3 px-4 rounded-xl text-white bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition transform hover:-translate-y-0.5">
                            Enter Garden
                        </button>

                        {{-- Register Link --}}
                        <div class="text-center text-sm">
                            <span class="text-green-600">Don't have an account?</span>
                            <a href="{{ route('register') }}" class="ml-1 font-medium text-green-600 hover:text-green-500">
                                Register here
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
