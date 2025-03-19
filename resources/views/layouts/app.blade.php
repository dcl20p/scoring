<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AssessCrafter') }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/dashboard.js'])
    
    <!-- Alpine.js -->
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script> --}}
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
    class="font-sans antialiased bg-gray-80 min-h-screen [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-track]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-thumb]:bg-gray-300">
    <div class="min-h-screen flex p-5 xl:pr-0">
        <!-- Sidebar Navigation (Collapsible) -->
        @include('layouts.partials.manager.sidebar')

        <!-- Main Content -->
        <div class="w-full page-wrapper xl:px-6 px-0">
            <!-- Page Content -->
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