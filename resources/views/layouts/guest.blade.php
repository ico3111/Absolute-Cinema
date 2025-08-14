<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-[#7C0B0B] antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 " style="background-color:#0e0e0e">
            <div>
                <a href="/">
                    <img src="https://preview.redd.it/absolute-cinema-v0-nguwobt3q5be1.png?width=1440&format=png&auto=webp&s=aa1c2d897087327d06e4d68e318cc68396370d0a" class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div style="background-color: #1f1f21;"class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg text-[#7C0B0B]">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
