<header class="bg-white border-gray-200 dark:bg-black/100 dark:border dark:border-gray-800 shadow-md dark:shadow-gray-700/300 rounded-md py-4 px-6">
    <nav class="w-full flex items-center justify-between">
        <ul class="flex items-center gap-4">
            <li class="relative xl:hidden">
                <a href="javascript:void(0);" class="text-xl icon-hover cursor-pointer text-gray-700 dark:text-gray-200"
                    data-hs-overlay="#sidebar" aria-controls="sidebar"
                    aria-label="Toggle navigation">
                    <i class="ti ti-menu-2 relative z-1"></i>
                </a>
            </li>
            <li class="hidden lg:block">
                <div class="relative ">
                    <input type="text" class="pl-10 pr-10 py-2 border rounded-md dark:bg-gray-800 dark:border-gray-700 dark:text-neutral-200" placeholder="Search...">
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 dark:text-neutral-400">
                        <i class="ti ti-search"></i>
                    </span>
                    <span class="absolute right-3 top-1/2 transform -translate-y-1/2 dark:text-neutral-400">
                        ⌘ K
                    </span>
                </div>
            </li>
        </ul>
        <div class="flex items-center gap-4">
            <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                <a href="javascript:void(0)"
                    class="rounded-full border dark:border-gray-700 flex items-center justify-center">
                    <span class="flex justify-center items-center relative w-9 h-9">
                        @if(app()->getLocale() == 'en')
                            <img src="{{ asset('images/flags/us.svg') }}" alt="US Flag" class="w-full h-full rounded-full object-cover">
                        @else
                            <img src="{{ asset('images/flags/vn.svg') }}" alt="Vietnam Flag" class="w-full h-full rounded-full object-cover">
                        @endif
                    </span>
                </a>
                <div class="hidden relative bg-white dark:bg-gray-800 dark:border dark:border-gray-800 shadow-md dark:shadow-gray-700/300 hs-dropdown-menu min-w-max w-[150px] z-[12] rounded-md duration hs-dropdown-open:opacity-100 opacity-0 mt-2 transition-[opacity,margin]" aria-labelledby="hs-dropdown-custom-icon-trigger">
                    <div class="py-2 p-0">
                        <a href="{{ route('language.change', 'vi') }}" class="flex items-center gap-2 hover:bg-gray-100 px-4 py-1.5 dark:hover:bg-gray-700 text-gray-500 dark:text-gray-300">
                            <img src="{{ asset('images/flags/vn.svg') }}" alt="Vietnam Flag" class="w-5 h-4 object-cover">
                            <span>Tiếng Việt</span>
                        </a>
                        <a href="{{ route('language.change', 'en') }}" class="flex items-center gap-2 hover:bg-gray-100 px-4 py-1.5 dark:hover:bg-gray-700 text-gray-500 dark:text-gray-300">
                            <img src="{{ asset('images/flags/us.svg') }}" alt="US Flag" class="w-5 h-4 object-cover">
                            <span>English</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="relative w-9 h-9 ">
                <a href="javascript:void(0)"
                    class="rounded-full border flex items-center justify-center dark:border-gray-700 hover:bg-gray-200  dark:hover:bg-neutral-800"
                    @click="darkMode = !darkMode">
                    <span class="flex justify-center items-center size-9 relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 moon-icon theme-toggle-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sun-icon theme-toggle-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </span>
                </a>
            </div>
            
            <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                <a href="javascript:void(0);"class="relative w-9 h-9 rounded-full border flex items-center justify-center hover:bg-gray-200 dark:border-gray-700 dark:text-neutral-200 dark:hover:bg-neutral-800 hs-dropdown-toggle">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path>
                        <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path>
                    </svg>
                    <span class="absolute inline-flex items-center justify-center text-white text-[11px] font-medium bg-red-400 w-2 h-2 rounded-full -top-[1px] -right-[2px]">
                        <span class="absolute inline-flex items-center justify-center text-white text-[11px] font-medium animate-ping bg-red-400 opacity-75 w-2 h-2 rounded-full"></span>
                    </span>
                </a>
                <div class="relative bg-white dark:bg-gray-800 dark:border dark:border-gray-800 shadow-md dark:shadow-gray-700/300 hidden min-w-max w-[300px] z-[12] rounded-md duration hs-dropdown-open:opacity-100 opacity-0 mt-2 hs-dropdown-menu transition-[opacity,margin]" aria-labelledby="hs-dropdown-custom-icon-trigger">
                    <div class="p-2">
                        <div class="notification-header flex items-center justify-between px-6 py-3 border-b dark:border-b-gray-700">
                            <h3 class="text-gray-500 dark:text-gray-300 font-semibold text-base">Notification</h3>
                            <button class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                                <i class="ti ti-x text-lg"></i>
                            </button>
                        </div>
                        <ul class="list-none flex flex-col max-h-[350px] w-[300px] sm:w-[350px] overflow-y-auto scrollbar-custom">
                            @for ($i = 0; $i < 10; $i++)  
                                <li>
                                    <a href="#" class="py-3 px-6 block rounded-lg border-b border-gray-100 hover:bg-gray-100 dark:border-b-gray-700 dark:hover:bg-white/5 transition-colors">
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
                            <a href="#" class="block w-full py-2 px-4 text-center text-gray-500 dark:text-gray-300 font-medium border border-gray-200 dark:border-gray-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors view-all-btn">
                                View All Notification
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                <a class="relative hs-dropdown-toggle cursor-pointer align-middle w-9 h-9 rounded-full">
                    <x-forms.img :width="36" :height="36" class="rounded-full" />
                </a>
                <div class="hidden relative bg-white dark:bg-gray-800 dark:border dark:border-gray-800 shadow-md dark:shadow-gray-700/300 hs-dropdown-menu min-w-max w-[200px] z-[12] rounded-md duration hs-dropdown-open:opacity-100 opacity-0 mt-2 transition-[opacity,margin]" aria-labelledby="hs-dropdown-custom-icon-trigger">
                    <div class="py-2 p-0">
                        <a href="javascript:void(0);" class="flex items-center gap-2 hover:bg-gray-100 px-4 py-1.5 dark:hover:bg-gray-700 text-gray-500 dark:text-gray-300">
                            <i class="ti ti-user text-xl"></i>
                            <p class="text-sm">My Profile</p>
                        </a>
                        <a href="javascript:void(0);" class="flex items-center gap-2 hover:bg-gray-100 px-4 py-1.5 dark:hover:bg-gray-700 text-gray-500 dark:text-gray-300">
                            <i class="ti ti-mail text-xl"></i>
                            <p class="text-sm">My Account</p>
                        </a>
                        <a href="javascript:void(0);" class="flex items-center  gap-2 hover:bg-gray-100 px-4 py-1.5 dark:hover:bg-gray-700 text-gray-500 dark:text-gray-300">
                            <i class="ti ti-list-check text-xl"></i>
                            <p class="text-sm">My Task</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>