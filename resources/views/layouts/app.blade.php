<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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

<body>
    <div class="min-h-screen bg-gray-100">
        <!-- Navbar -->
        @include('components.navbar')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

        @include('components.footer')
    </div>
    @stack('scripts')
</body>

</html>
