<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="./img/fav.png" type="image/x-icon" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css" />
    @stack('styles')
</head>

<body class="bg-gray-100">

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
</body>

</html>
