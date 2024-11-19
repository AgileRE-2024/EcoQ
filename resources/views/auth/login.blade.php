<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login to EcoQ - Garden Paradise</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
    </style>
</head>

<body class="bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50 min-h-screen">
    <!-- Animated Background Elements -->
    <div class="fixed inset-0 pointer-events-none">
        <div class="absolute top-20 left-10 floating-leaf" style="animation-delay: 0s;">
            <svg class="w-16 h-16 text-green-200" viewBox="0 0 24 24" fill="currentColor">
                <path d="M21,12a9,9,0,0,1-9,9A9,9,0,0,1,3,12,9,9,0,0,1,12,3,9,9,0,0,1,21,12Z" />
            </svg>
        </div>
        <div class="absolute top-40 right-20 floating-leaf" style="animation-delay: 1s;">
            <svg class="w-12 h-12 text-emerald-200" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12,22A10,10,0,1,1,22,12,10,10,0,0,1,12,22Z" />
            </svg>
        </div>
    </div>

    <div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8 relative">
        <div class="max-w-md w-full space-y-8 glass-effect p-10 rounded-3xl shadow-xl relative overflow-hidden">
            <!-- Decorative Garden Elements -->
            <div
                class="absolute -top-10 -left-10 w-40 h-40 bg-gradient-to-br from-green-300/30 to-emerald-300/30 rounded-full blur-2xl">
            </div>
            <div
                class="absolute -bottom-10 -right-10 w-40 h-40 bg-gradient-to-tl from-teal-300/30 to-green-300/30 rounded-full blur-2xl">
            </div>

            <!-- Vine Decorations -->
            <div class="absolute top-0 left-0 w-24 h-24">
                <svg viewBox="0 0 100 100" class="text-green-400/20">
                    <path d="M0,0 Q50,50 100,0" stroke="currentColor" fill="none" stroke-width="2" />
                    <path d="M20,0 Q50,30 80,0" stroke="currentColor" fill="none" stroke-width="2" />
                </svg>
            </div>

            <div class="relative">
                <img class="mx-auto h-24 w-auto floating-leaf" src="{{ asset('assets/images/logo.png') }}"
                    alt="EcoQ Logo">
                <h2 class="mt-6 text-center text-3xl font-extrabold text-green-800">
                    Welcome to Garden Paradise
                </h2>
                <p class="mt-2 text-center text-sm text-green-600">
                    Sign in to your green sanctuary
                </p>
            </div>

            @if (session('status'))
                <div class="bg-green-100/80 backdrop-blur border-l-4 border-green-500 text-green-700 p-4 rounded-lg"
                    role="alert">
                    <p class="font-bold">Success</p>
                    <p>{{ session('status') }}</p>
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100/80 backdrop-blur border-l-4 border-red-500 text-red-700 p-4 rounded-lg"
                    role="alert">
                    <p class="font-bold">Error</p>
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="rounded-xl shadow-md bg-white/50 backdrop-blur p-6 space-y-4">
                    <div>
                        <label for="email-address" class="block text-sm font-medium text-green-900">Email
                            Address</label>
                        <input id="email-address" name="email" type="email" autocomplete="email" required
                            class="garden-input appearance-none rounded-lg relative block w-full px-4 py-3 mt-1 border border-gray-300 placeholder-green-400 text-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 sm:text-sm"
                            placeholder="🌱 Enter your email">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-green-900">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="garden-input appearance-none rounded-lg relative block w-full px-4 py-3 mt-1 border border-gray-300 placeholder-green-400 text-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 sm:text-sm"
                            placeholder="🔒 Enter your password">
                    </div>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox"
                            class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                        <label for="remember-me" class="ml-2 block text-sm text-green-700">
                            Remember me
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="#"
                            class="font-medium text-green-600 hover:text-green-500 transition duration-150">
                            Forgot your password?
                        </a>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-xl text-white bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-150 ease-in-out shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-green-100 group-hover:text-green-200"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        Enter Garden
                    </button>
                </div>

                <div class="mt-6 text-center text-sm">
                    <p class="text-green-600">
                        Don't have an account?
                    </p>
                    <a href="{{ route('register') }}"
                        class="font-medium text-green-600 hover:text-green-500 transition duration-150">
                        Register here
                    </a>
                </div>
            </form>


            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-green-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white/80 backdrop-blur text-green-600">
                            Or continue with
                        </span>
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-3 gap-3">
                    <div>
                        <a href="#"
                            class="w-full inline-flex justify-center py-2 px-4 border border-green-200 rounded-xl shadow-sm bg-white/80 backdrop-blur text-sm font-medium text-green-600 hover:bg-green-50 transition duration-150">
                            <span class="sr-only">Sign in with Facebook</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M20 10c0-5.523-4.477-10-10-10S0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443 2.89h-2.33v6.988C16.343 19.128 20 14.991 20 10z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>

                    <div>
                        <a href="#"
                            class="w-full inline-flex justify-center py-2 px-4 border border-green-200 rounded-xl shadow-sm bg-white/80 backdrop-blur text-sm font-medium text-green-600 hover:bg-green-50 transition duration-150">
                            <span class="sr-only">Sign in with Twitter</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path
                                    d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84" />
                            </svg>
                        </a>
                    </div>

                    <div>
                        <a href="#"
                            class="w-full inline-flex justify-center py-2 px-4 border border-green-200 rounded-xl shadow-sm bg-white/80 backdrop-blur text-sm font-medium text-green-600 hover:bg-green-50 transition duration-150">
                            <span class="sr-only">Sign in with GitHub</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M10 0C4.477 0 0 4.484 0 10.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.942.359.31.678.921.678 1.856 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0020 10.017C20 4.484 15.522 0 10 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Footer with Garden Elements -->
            <div class="absolute bottom-0 w-full mt-6">
                <div class="flex justify-center items-center pb-4">
                    <p class="text-center text-sm text-green-600 backdrop-blur bg-white/30 px-4 py-2 rounded-full">
                        &copy; 2024 Garden Paradise. Growing with nature 🌱
                    </p>
                </div>

                <!-- Decorative Bottom Garden Elements -->
                <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
                    <svg class="relative block w-full h-12" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 1200 120" preserveAspectRatio="none">
                        <path
                            d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                            class="fill-green-100/50"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Animated Nature Elements -->
        <div class="fixed bottom-0 left-0 w-full h-32 pointer-events-none">
            <div class="absolute bottom-0 left-1/4 floating-leaf" style="animation-delay: 0.5s;">
                <svg class="w-8 h-8 text-green-300/40" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12,2L1,21H23L12,2M12,6L19.53,19H4.47L12,6M11,10V14H13V10H11M11,16V18H13V16H11Z" />
                </svg>
            </div>
            <div class="absolute bottom-0 right-1/4 floating-leaf" style="animation-delay: 1.5s;">
                <svg class="w-6 h-6 text-emerald-300/40" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12,2L1,21H23L12,2M12,6L19.53,19H4.47L12,6M11,10V14H13V10H11M11,16V18H13V16H11Z" />
                </svg>
            </div>
        </div>
</body>

</html>
