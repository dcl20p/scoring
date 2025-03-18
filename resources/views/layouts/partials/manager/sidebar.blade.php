<aside 
    x-data="{ 
        open: localStorage.getItem('sidebar-expanded') === 'true' || true, 
        isMobileMenuOpen: false,
        toggleSidebar() {
            this.open = !this.open;
            localStorage.setItem('sidebar-expanded', this.open);
        },
        toggleMobileMenu() {
            this.isMobileMenuOpen = !this.isMobileMenuOpen;
        }
    }" 
    :class="{'w-64': open, 'w-20': !open, 'fixed inset-y-0 left-0 z-40 md:relative': true, 'transform -translate-x-full md:translate-x-0': !isMobileMenuOpen, 'transform translate-x-0': isMobileMenuOpen}"
    class="bg-white dark:bg-gray-800 shadow-sm border-r dark:border-gray-700 h-screen overflow-y-auto transition-all duration-300"
>
    <div class="p-4 border-b dark:border-gray-700 flex items-center justify-between">
        <a href="{{ auth()->user()->isAdmin() ? route('admin.dashboard') : route('teacher.dashboard') }}" 
            class="flex items-center justify-center">
            <div :class="{'hidden': !open}">
                <div class="font-semibold text-primary dark:text-white text-xl tracking-tight">
                    AssessCrafter
                </div>
            </div>
            <div :class="{'hidden': open}">
                <div class="font-semibold text-primary dark:text-white text-xl tracking-tight">
                    AC
                </div>
            </div>
        </a>
    </div>

    <nav class="mt-6 px-2">
        <div class="px-4 py-2" :class="{'hidden': !open}">
            <p class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase tracking-wider">
                {{ auth()->user()->role === 'admin' ? 'Admin' : 'Teacher' }} Dashboard
            </p>
        </div>

        <!-- Admin Navigation Links -->
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'bg-primary text-white dark:bg-primary dark:text-white' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }} flex items-center px-4 py-2 rounded-md group transition-colors mb-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span :class="{'hidden': !open}">Dashboard</span>
        </a>
        <a href="#" class="text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center px-4 py-2 rounded-md group transition-colors mb-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <span :class="{'hidden': !open}">Candidates</span>
        </a>
        <a href="#" class="text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center px-4 py-2 rounded-md group transition-colors mb-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
            </svg>
            <span :class="{'hidden': !open}">Scoring Criteria</span>
        </a>
        <a href="#" class="text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center px-4 py-2 rounded-md group transition-colors mb-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
            <span :class="{'hidden': !open}">Reports</span>
        </a>

        <!-- Teacher Navigation Links -->
        <a href="{{ route('teacher.dashboard') }}" class="{{ request()->routeIs('teacher.dashboard') ? 'bg-primary text-white dark:bg-primary dark:text-white' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }} flex items-center px-4 py-2 rounded-md group transition-colors mb-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span :class="{'hidden': !open}">Dashboard</span>
        </a>
        <a href="#" class="text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center px-4 py-2 rounded-md group transition-colors mb-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
            </svg>
            <span :class="{'hidden': !open}">Scan QR Code</span>
        </a>
        <a href="#" class="text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center px-4 py-2 rounded-md group transition-colors mb-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 7h12" />
            </svg>
            <span :class="{'hidden': !open}">My Assessments</span>
        </a>
    </nav>

    <div class="border-t dark:border-gray-700 mt-8 pt-4 px-4" :class="{'text-center': !open}">
        <div class="flex items-center" :class="{'justify-center': !open, 'justify-between': open}">
            <div class="flex items-center" :class="{'flex-col': !open}">
                <div class="h-8 w-8 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-sm font-semibold text-gray-700 dark:text-gray-300">
                    {{ substr(auth()->user()->first_name, 0, 1) }}{{ substr(auth()->user()->last_name, 0, 1) }}
                </div>
                <div class="ml-3" :class="{'hidden': !open, 'ml-0 mt-1': !open}">
                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ auth()->user()->full_name }}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400 capitalize">{{ auth()->user()->role }}</p>
                </div>
            </div>
        </div>
    </div>
</aside>