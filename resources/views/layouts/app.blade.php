<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">



    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-white border-b border-gray-100 p-4 flex items-center gap-4">
            <div class="block w-12 h-12 ">
                <img src="{{ asset('build/assets/logo.svg') }}" class="w-full h-full object-contain" alt="Logo">
            </div>
            <span class="font-bold text-xl">Messenger</span>
        </nav>

        @include('layouts.navigation')

        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
