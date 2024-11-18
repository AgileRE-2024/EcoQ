<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 text-gray-800">
    <!-- Navbar -->
    @include('components.navbar')

    <!-- Hero Section -->
    @include('components.hero-section')

<!-- Main Content -->
        <div class="container mx-auto mt-8">
            <h1 class="text-4xl font-bold text-center">Welcome to EcoQ</h1>
            <p class="mt-4 text-center text-lg">Platform untuk rekomendasi taman Anda!</p>
        </div>
    </body>
</html>
