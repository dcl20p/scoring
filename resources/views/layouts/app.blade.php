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
        <aside x-data="{ open: true }" :class="{'w-64': open, 'w-20': !open}" class="bg-white shadow-sm border-r h-screen sticky top-0 overflow-y-auto transition-all duration-300">
            <div class="p-4 border-b flex items-center justify-between">
                <a href="#" 
                   class="flex items-center justify-center">
                    <div class="relative" :class="{'hidden': !open}">
                        <x-logo />
                    </div>
                    <div class="relative" :class="{'hidden': open}">
                        <div class="relative bg-white dark:bg-gray-900 rounded-full p-1.5 border border-primary/20 shadow-sm">
                            <svg class="w-7 h-7 text-primary" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 4H21C21 2.89543 20.1046 2 19 2H13C11.8954 2 11 2.89543 11 4H10C8.89543 4 8 4.89543 8 6V28C8 29.1046 8.89543 30 10 30H22C23.1046 30 24 29.1046 24 28V6C24 4.89543 23.1046 4 22 4Z" fill="#E5DEFF" stroke="#8B5CF6" stroke-width="1.5" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                </a>
                
                <!-- Toggle sidebar button -->
                <button @click="open = !open" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                    </svg>
                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            <nav class="mt-6 px-2">
                <div class="px-4 py-2" :class="{'hidden': !open}">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">
                        {{ auth()->user() === 'admin' ? 'Admin' : 'Teacher' }} Dashboard
                    </p>
                </div>

                @admin
                <!-- Admin Navigation Links -->
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-gray-100' }} flex items-center px-4 py-2 rounded-md group transition-colors mb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span :class="{'hidden': !open}">Dashboard</span>
                </a>
                <a href="#" class="text-gray-700 hover:bg-gray-100 flex items-center px-4 py-2 rounded-md group transition-colors mb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span :class="{'hidden': !open}">Candidates</span>
                </a>
                <a href="#" class="text-gray-700 hover:bg-gray-100 flex items-center px-4 py-2 rounded-md group transition-colors mb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                    <span :class="{'hidden': !open}">Scoring Criteria</span>
                </a>
                <a href="#" class="text-gray-700 hover:bg-gray-100 flex items-center px-4 py-2 rounded-md group transition-colors mb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    <span :class="{'hidden': !open}">Reports</span>
                </a>
                @endadmin

                @teacher
                <!-- Teacher Navigation Links -->
                <a href="{{ route('teacher.dashboard') }}" class="{{ request()->routeIs('teacher.dashboard') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-gray-100' }} flex items-center px-4 py-2 rounded-md group transition-colors mb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span :class="{'hidden': !open}">Dashboard</span>
                </a>
                <a href="#" class="text-gray-700 hover:bg-gray-100 flex items-center px-4 py-2 rounded-md group transition-colors mb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                    </svg>
                    <span :class="{'hidden': !open}">Scan QR Code</span>
                </a>
                <a href="#" class="text-gray-700 hover:bg-gray-100 flex items-center px-4 py-2 rounded-md group transition-colors mb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 7h12" />
                    </svg>
                    <span :class="{'hidden': !open}">My Assessments</span>
                </a>
                @endteacher
            </nav>

            <div class="border-t mt-8 pt-4 px-4" :class="{'text-center': !open}">
                <div class="flex items-center" :class="{'justify-center': !open, 'justify-between': open}">
                    <div class="flex items-center" :class="{'flex-col': !open}">
                        <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-sm font-semibold text-gray-700">
                            {{ substr(auth()->user(), 0, 1) }}{{ substr(auth()->user(), 0, 1) }}
                        </div>
                        <div class="ml-3" :class="{'hidden': !open, 'ml-0 mt-1': !open}">
                            <p class="text-sm font-medium text-gray-700">{{ auth()->user() }}</p>
                            <p class="text-xs text-gray-500 capitalize">{{ auth()->user()}}</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-gray-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 min-h-screen">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm sticky top-0 z-10">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex items-center justify-between">
                    <div>
                        <h1 class="text-lg font-semibold text-gray-800">@yield('header', 'Dashboard')</h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <!-- Language Switcher -->
                        <div x-data="{ open: false }" class="relative">
                            <button 
                                @click="open = !open" 
                                class="flex items-center gap-2 px-3 py-2 bg-white/70 rounded-md border border-gray-200 shadow-sm text-sm font-medium text-gray-700 hover:bg-white/90 transition-colors focus:outline-none"
                            >
                                @if(app()->getLocale() == 'en')
                                    <img src="{{ asset('images/flags/us.svg') }}" alt="US Flag" class="w-5 h-4 object-cover">
                                @else
                                    <img src="{{ asset('images/flags/vn.svg') }}" alt="Vietnam Flag" class="w-5 h-4 object-cover">
                                @endif
                                {{ app()->getLocale() == 'en' ? 'English' : 'Tiếng Việt' }}
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down"><path d="m6 9 6 6 6-6"/></svg>
                            </button>
                            <div 
                                x-show="open" 
                                @click.away="open = false"
                                class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg border border-gray-100 z-50"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                            >
                                <a href="{{ route('language.change', 'en') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ app()->getLocale() == 'en' ? 'bg-gray-100 font-medium' : '' }}">
                                    <img src="{{ asset('images/flags/us.svg') }}" alt="US Flag" class="w-5 h-4 object-cover">
                                    English
                                </a>
                                <a href="{{ route('language.change', 'vi') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ app()->getLocale() == 'vi' ? 'bg-gray-100 font-medium' : '' }}">
                                    <img src="{{ asset('images/flags/vn.svg') }}" alt="Vietnam Flag" class="w-5 h-4 object-cover">
                                    Tiếng Việt
                                </a>
                            </div>
                        </div>
                        
                        <!-- Notification button -->
                        <button type="button" class="text-gray-500 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-4 sm:p-6">
                <div class="max-w-7xl mx-auto">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Toast Notifications Container -->
    <div id="toast-container" class="fixed bottom-4 right-4 z-50"></div>
</body>
</html>