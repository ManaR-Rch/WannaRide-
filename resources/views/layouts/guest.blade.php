<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>UberGo</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Custom Styles -->
        <style>
            .hover-scale {
                transition: transform 0.2s ease-in-out;
            }
            .hover-scale:hover {
                transform: scale(1.05);
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <!-- Background and Layout -->
        <div class="min-h-screen bg-gray-900 flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <!-- Logo -->
            <div class="mb-8">
                <a href="/" class="text-4xl font-bold text-orange-500 hover:text-orange-400 transition duration-300">
                    UberGo
                </a>
            </div>

            <!-- Card Container -->
            <div class="w-full sm:max-w-md mx-4 my-12 bg-gray-800 rounded-xl shadow-2xl overflow-hidden border border-gray-700">
                <!-- Card Content -->
                <div class="px-8 py-10 text-white">
                    {{ $slot }}
                </div>
            </div>

            <!-- Footer -->
            <div class="mb-8 text-center text-gray-300">
                <p class="text-sm">&copy; {{ date('Y') }} UberGo. All rights reserved.</p>
                <div class="mt-4 space-x-4">
                    <a href="#" class="text-orange-400 hover:text-orange-300 transition duration-300">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="text-orange-400 hover:text-orange-300 transition duration-300">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-orange-400 hover:text-orange-300 transition duration-300">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>