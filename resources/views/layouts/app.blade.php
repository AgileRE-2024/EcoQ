<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        /* Scrollbar styling */
        ::-webkit-scrollbar {
            width: 12px;
            /* Lebar scrollbar */
            height: 12px;
            /* Tinggi scrollbar horizontal (opsional) */
        }

        ::-webkit-scrollbar-track {
            background: linear-gradient(to bottom, #e0f7df, #c8e6c9);
            /* Warna latar track scrollbar */
            border-radius: 10px;
            /* Membuat sudut melengkung */
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);
            /* Efek bayangan di dalam track */
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #81c784, #66bb6a);
            /* Warna pegangan scrollbar */
            border-radius: 10px;
            /* Membuat sudut melengkung */
            border: 2px solid #e0f7df;
            /* Memberikan batas hijau pucat */
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #66bb6a, #388e3c);
            /* Warna pegangan saat dihover */
        }

        ::-webkit-scrollbar-corner {
            background: #e0f7df;
            /* Warna sudut scrollbar */
        }
    </style>
    @stack('styles')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800">
    <!-- Navbar -->
    @include('components.navbar')

    @yield('content')


    <!-- Footer Section -->
    @include('components.footer')


    @stack('scripts')
</body>

</html>
