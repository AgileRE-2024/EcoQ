<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css" />
</head>

<body>
    <!-- source:https://codepen.io/owaiswiz/pen/jOPvEPB -->
    <div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
        <div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
            <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
                <div>
                    <h2 class="mt-6 text-3xl font-bold text-center text-gray-900">
                        Welcome to EcoQ
                    </h2>
                    <h3 class="mt-1 text-2xl text-center text-gray-600">
                        Sign in to your account
                    </h3>
                </div>
                @if (session('status'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mt-6" role="alert">
                        <p class="font-bold">
                            Success
                        </p>
                        <p>
                            {{ session('status') }}
                        </p>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-6" role="alert">
                        <p class="font-bold">
                            Error
                        </p>
                        @foreach ($errors->all() as $error)
                            <p>
                                {{ $error }}
                            </p>
                        @endforeach
                    </div>

                @endif
                <div class="mt-6 flex flex-col items-center">
                    <div class="p-8">
                        <h2 class="text-4xl font-bold text-center text-gray-800">
                            Create Your EcoQ Account
                        </h2>
                        <p class="mt-2 text-lg text-center text-gray-500">
                            Sign up to get started
                        </p>

                        @if ($errors->any())
                            <div class="bg-red-50 border-l-4 border-red-400 text-red-700 p-4 mt-4 rounded"
                                role="alert">
                                <strong>Error:</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('register') }}" method="POST" class="mt-8">
                            @csrf
                            <div class="mb-4">
                                <input type="text" name="name" placeholder="Full Name"
                                    class="w-full p-3 border border-gray-300 input-style text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div class="mb-4">
                                <input type="email" name="email" placeholder="Email"
                                    class="w-full p-3 border border-gray-300 input-style text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div class="mb-4">
                                <input type="password" name="password" placeholder="Password"
                                    class="w-full p-3 border border-gray-300 input-style text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div class="mb-4">
                                <input type="password" name="password_confirmation" placeholder="Confirm Password"
                                    class="w-full p-3 border border-gray-300 input-style text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <button type="submit"
                                class="w-full py-3 button-style text-white font-semibold flex items-center justify-center hover:bg-blue-700 bg-blue-500 focus:outline-none">
                                <i class="fad fa-user-plus mr-3"></i> Sign Up
                            </button>

                            <div class="mt-6 text-center text-gray-600">
                                Already have an account?
                                <a href="{{ route('login') }}" class="text-blue-500 hover:underline link-style">Log
                                    In</a>
                            </div>

                            <div class="mt-4 text-center text-gray-600">
                                By signing up, you agree to EcoQ's
                                <a href="#" class="text-blue-500 hover:underline link-style">Terms of Service</a>
                                and
                                <a href="#" class="text-blue-500 hover:underline link-style">Privacy Policy</a>.
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="flex-1 bg-indigo-100 text-center hidden lg:flex">
                <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat"
                    style="background-image: url('https://storage.googleapis.com/devitary-image-host.appspot.com/15848031292911696601-undraw_designer_life_w96d.svg');">
                </div>
            </div>
        </div>
    </div>
</body>

</html>
