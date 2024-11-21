<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="./img/fav.png" type="image/x-icon" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css" />
    @stack('styles')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-gray-100">
    <!-- Mobile Menu Trigger -->
    <button x-data="{ open: false }" @click="open = !open"
        class="lg:hidden fixed top-4 left-4 z-50 bg-green-600 text-white p-2 rounded-md shadow-md">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- start wrapper -->
    <div class="h-screen flex">
        <!-- start sidebar -->
        @include('dashboard.components.sidebar')
        <!-- end sidebar -->

        <!-- start content -->
        <div class="flex-1 overflow-y-auto">
            @yield('content')
        </div>
        <!-- end content -->
    </div>
    <!-- end wrapper -->
    @stack('scripts')
</body>

</html>
