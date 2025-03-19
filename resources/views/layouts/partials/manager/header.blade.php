<header class="bg-white dark:bg-black/100 shadow-md dark:shadow-gray-700/30 rounded-md w-full text-sm py-4 px-6">
    <nav class="w-full flex items-center justify-between" aria-label="Global">
        <ul class="icon-nav flex items-center gap-4">
            <li class="relative xl:hidden">
                <a class="text-xl icon-hover cursor-pointer text-gray-700 dark:text-gray-200" id="headerCollapse"
                    data-hs-overlay="#application-sidebar-brand" aria-controls="application-sidebar-brand"
                    aria-label="Toggle navigation" href="javascript:void(0)">
                    <i class="ti ti-menu-2 relative z-1"></i>
                </a>
            </li>
        </ul>
        <div class="flex items-center gap-4">
            <button type="button"
                class="relative w-9 h-9 rounded-full border dark:border-gray-700 flex items-center justify-center text-gray-800 hover:bg-gray-200 focus:outline-none dark:text-neutral-200 dark:hover:bg-neutral-800"
                @click="darkMode = !darkMode">
                <span class="flex justify-center items-center size-9 relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 moon-icon theme-toggle-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sun-icon theme-toggle-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </span>
            </button>
            <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                <a class="relative hs-dropdown-toggle w-9 h-9 rounded-full border dark:border-gray-700 justify-center items-center flex hover:text-gray-500 dark:hover:text-gray-300 text-gray-300 dark:text-gray-400" href="#">
                    <i class="ti ti-bell-ringing text-xl relative z-[1]"></i>
                    <span class="absolute inline-flex items-center justify-center text-white text-[11px] font-medium bg-orange-400 w-2 h-2 rounded-full -top-[1px] -right-[2px]">
                        <span class="absolute inline-flex items-center justify-center text-white text-[11px] font-medium animate-ping bg-orange-400 opacity-75 w-2 h-2 rounded-full"></span>
                    </span>
                </a>
                <div class="card dark:bg-gray-800 hs-dropdown-menu transition-[opacity,margin] rounded-md duration hs-dropdown-open:opacity-100 opacity-0 mt-2 min-w-max w-[300px] hidden z-[12]"
                    aria-labelledby="hs-dropdown-custom-icon-trigger">
                    <div class="p-2">
                        <div class="flex items-center justify-between px-6 py-3 border-b border-gray-100 dark:border-gray-700 notification-header">
                            <h3 class="text-gray-500 dark:text-gray-300 font-semibold text-base">Notification</h3>
                            <button class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                                <i class="ti ti-x text-lg"></i>
                            </button>
                        </div>
                        {{-- <ul class="list-none flex flex-col max-h-[350px] overflow-y-auto custom-scrollbar"> --}}
                        <ul class="list-none flex flex-col p-2 max-h-[350px] overflow-y-auto w-[300px] sm:w-[350px]
                            [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-track]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-thumb]:bg-gray-300">
                            @for ($i = 0; $i < 10; $i++)      
                                <li>
                                    <a href="#" class="py-3 px-6 block rounded-lg border-b border-gray-100 hover:bg-gray-50 dark:border-gray-800 dark:hover:bg-white/5 transition-colors">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0">
                                                <div class="w-9 h-9 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center overflow-hidden">
                                                <x-forms.img :width="100" :height="100"/>
                                                </div>
                                            </div>
                                            <div class="flex-1">
                                                <div class="flex items-center justify-between">
                                                    <p class="text-sm text-gray-500 dark:text-gray-300 font-medium">
                                                        <span class="font-semibold">Terry Franci</span> requests permission to change 
                                                        <span class="font-semibold">Project - Nganter App</span>
                                                    </p>
                                                </div>
                                                <div class="flex items-center mt-1 text-xs text-gray-400 dark:text-gray-500">
                                                    <span>Project</span>
                                                    <span class="mx-1">•</span>
                                                    <span>5 min ago</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endfor
                        </ul>
                        <div class="p-2 border-gray-100 dark:border-gray-700 notification-footer">
                            <a href="#" class="block w-full py-2 px-4 text-center text-gray-500 dark:text-gray-300 font-medium border border-gray-200 dark:border-gray-700 rounded-md hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors view-all-btn">
                                View All Notification
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                <a class="relative hs-dropdown-toggle cursor-pointer align-middle rounded-full">
                    <x-forms.img :width="36" :height="36" class="rounded-full" />
                </a>
                <div class="card dark:bg-gray-800 hs-dropdown-menu transition-[opacity,margin] rounded-md duration hs-dropdown-open:opacity-100 opacity-0 mt-2 min-w-max w-[200px] hidden z-[12]"
                    aria-labelledby="hs-dropdown-custom-icon-trigger">
                    <div class="card-body p-0 py-2">
                        <a href="javscript:void(0)"
                            class="flex gap-2 items-center font-medium px-4 py-1.5 hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-400 dark:text-gray-300 profile-menu-item">
                            <i class="ti ti-user text-xl"></i>
                            <p class="text-sm">My Profile</p>
                        </a>
                        <a href="javscript:void(0)"
                            class="flex gap-2 items-center font-medium px-4 py-1.5 hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-400 dark:text-gray-300 profile-menu-item">
                            <i class="ti ti-mail text-xl"></i>
                            <p class="text-sm">My Account</p>
                        </a>
                        <a href="javscript:void(0)"
                            class="flex gap-2 items-center font-medium px-4 py-1.5 hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-400 dark:text-gray-300 profile-menu-item">
                            <i class="ti ti-list-check text-xl"></i>
                            <p class="text-sm">My Task</p>
                        </a>
                        <div class="px-4 mt-[7px] grid">
                            <a href="../../pages/authentication-login.html"
                                class="btn-outline-primary font-medium text-[15px] w-full hover:bg-blue-600 hover:text-white dark:border-blue-600 dark:text-blue-400 dark:hover:bg-blue-600 dark:hover:text-white logout-btn">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
