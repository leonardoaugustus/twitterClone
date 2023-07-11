<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
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
    @livewireStyles
</head>
<body class="font-sans antialiased h-full bg-black text-white">


    <div class="container mx-auto grid grid-cols-4 h-full">
        <div class="pt-px text-[#d6d9db] space-y-1">
            <x-menu.item route="/timeline" icon="twitter" />
            <x-menu.item route="/timeline" icon="home" title="Home" />
            <x-menu.item route="/explore" icon="explore" title="Explore" />
        </div>

        <div class="col-span-2 border-x-[0.625px] border-[#2f3336]"></div>
        <div class="">as</div>
    </div>

    @livewireScripts
</body>
</html>
