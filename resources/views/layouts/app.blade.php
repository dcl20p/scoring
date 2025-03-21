<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name', 'AssessCrafter') }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- Scripts -->
    @include('layouts.partials.manager.no-script-simplebar')
    
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/dashboard.js'])
</head>
<body
    x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }"
    x-init="$watch('darkMode', val => { 
        localStorage.setItem('darkMode', val); 
        if(val) { document.documentElement.classList.add('dark'); } 
        else { document.documentElement.classList.remove('dark'); }
    }); 
    if(darkMode) { document.documentElement.classList.add('dark'); }"
    :class="{ 'dark': darkMode }"
    class="font-san antialiased scrollbar-custom min-h-screen ">

    <div class="flex p-5 xl:pr-0">
        @include('layouts.partials.manager.sidebar')

        <div class="w-full xl:px-6 px-0 xl:ml-[270px] transition-[margin-left] duration-300 ease-in-out">
            <main class="h-full max-w-7xl mx-auto">
                <div class="px-2 p-0 flex flex-col gap-6">
                    @include('layouts.partials.manager.header')
                    {{ $slot }}

                    @include('layouts.partials.manager.footer') 
                </div>
            </main>
        </div>
    </div>
    
</body>
</html>