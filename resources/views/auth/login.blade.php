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
                    <div class="w-full flex-1 mt-2">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mx-auto max-w-xs">
                                <input
                                    class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                    type="email" placeholder="Email" name="email" />
                                <input
                                    class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                                    type="password" placeholder="Password" name="password" />

                                <div class="flex justify-between items-baseline">
                                    <button
                                        class="mt-5 tracking-wide font-semibold bg-gray-700 text-gray-100 w-full py-4 rounded-lg hover:bg-gray-900 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                        <span class="mr-3">
                                            <i class="fad fa-sign-in-alt"></i>
                                        </span>
                                        Sign In
                                    </button>
                                </div>
                                <p class="mt-6 text-s text-gray-600 text-center">
                                    Don't have an account yet?
                                    <a href="{{ route('register') }}" class="border-b border-gray-500 border-dotted">
                                        Sign Up
                                    </a>
                                </p>

                                <p class="mt-6 text-s text-gray-600 text-center">
                                    I agree to abide by templatana's
                                    <a href="#" class="border-b border-gray-500 border-dotted">
                                        Terms of Service
                                    </a>
                                    and its
                                    <a href="#" class="border-b border-gray-500 border-dotted">
                                        Privacy Policy
                                    </a>
                                </p>
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
