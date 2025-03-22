<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AssessCrafter') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/guest.css', 'resources/js/guest.js'])
    @else
        <link rel="stylesheet" href="{{ asset('css/fallback.css') }}">
    @endif
    
    <!-- Alpine.js -->
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script> --}}
</head>
<body class="font-sans antialiased bg-gradient-to-br from-white to-gray-100 min-h-screen flex flex-col">
    <x-flash-message />
    <!-- Enhanced decorative background effect -->
   <div class="fixed inset-0 -z-10 w-full h-full overflow-hidden">
        <div class="absolute -top-[20%] -left-[10%] w-[60%] h-[60%] rounded-full bg-purple-500/15 blur-3xl"></div>
        <div class="absolute -bottom-[20%] -right-[10%] w-[60%] h-[60%] rounded-full bg-blue-600/15 blur-3xl"></div>
        <div class="absolute top-[40%] right-[15%] w-[40%] h-[40%] rounded-full bg-pink-500/15 blur-3xl"></div>
        <div class="absolute top-[60%] left-[15%] w-[30%] h-[30%] rounded-full bg-indigo-500/15 blur-3xl"></div>
    </div>

    @php
        $showNavbarRoutes = ['landing', 'terms', 'privacy', 'contact'];
        $currentRoute = Route::currentRouteName();
        $showNavbar = in_array($currentRoute, $showNavbarRoutes);
    @endphp

    @if ($showNavbar)
        @include('layouts.partials.customer.navigation')
    @else
        <div class="fixed top-4 right-4 z-30">
            <x-lang />
        </div>
    @endif

    <main class="flex-1 flex items-center justify-center py-16 px-4">
        {{ $slot }}
    </main>

    @if ($showNavbar)
        @include('layouts.partials.customer.footer')
    @endif
    
    <!-- Toast Notifications Container -->
    <div id="toast-container" class="fixed bottom-4 right-4 z-50"></div>
</body>
</html>