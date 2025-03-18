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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
</head>
<body class="font-sans antialiased bg-gray-50 min-h-screen">
    <div class="min-h-screen flex">
        <!-- Sidebar Navigation (Collapsible) -->
        @include('layouts.partials.manager.sidebar')

        <!-- Main Content -->
        <div class="flex-1 min-h-screen w-full">

            @include('layouts.partials.manager.header')

            <!-- Page Content -->
            <main class="p-4 sm:p-6 bg-gray-50 dark:bg-gray-900 w-full">
                {{ $slot }}
            </main>
        </div>
    </div>

    <!-- Toast Notifications Container -->
    <div id="toast-container" class="fixed bottom-4 right-4 z-50"></div>
    <!-- Backdrop Overlay for Mobile Menu (shown when mobile menu is open) -->
    <div 
        x-show="isMobileMenuOpen" 
        @click="toggleMobileMenu()" 
        class="fixed inset-0 bg-black bg-opacity-50 z-30 md:hidden"
        style="display: none;"
    ></div>
</body>
</html>