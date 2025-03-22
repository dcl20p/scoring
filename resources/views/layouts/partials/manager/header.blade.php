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
                    <input type="text" class="pl-10 pr-10 py-2 border rounded-md dark:bg-gray-800 dark:border-gray-700 dark:text-neutral-200" placeholder="{{ __('dashboard.search.placeholder') }}">
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 dark:text-neutral-400">
                        <x-icons.search />
                    </span>
                    <span class="absolute right-3 top-1/2 transform -translate-y-1/2 dark:text-neutral-400">
                        {{ __('dashboard.search.shortcut') }}
                    </span>
                </div>
            </li>
        </ul>
        <div class="flex items-center gap-4">
            <!-- Language Dropdown -->
            <x-dropdowns.main align="right" width="150px">
                <x-slot name="trigger">
                    <a href="javascript:void(0)" class="rounded-full border dark:border-gray-700 flex items-center justify-center">
                        <span class="flex justify-center items-center relative w-9 h-9">
                            @if(app()->getLocale() == 'en')
                                <img src="{{ asset('images/flags/us.svg') }}" alt="US Flag" class="w-full h-full rounded-full object-cover">
                            @else
                                <img src="{{ asset('images/flags/vn.svg') }}" alt="Vietnam Flag" class="w-full h-full rounded-full object-cover">
                            @endif
                        </span>
                    </a>
                </x-slot>
                <x-slot name="content">
                    <x-dropdowns.item href="{{ route('language.change', 'vi') }}">
                        <img src="{{ asset('images/flags/vn.svg') }}" alt="Vietnam Flag" class="w-5 h-4 object-cover">
                        <span>Tiếng Việt</span>
                    </x-dropdowns.item>
                    <x-dropdowns.item href="{{ route('language.change', 'en') }}">
                        <img src="{{ asset('images/flags/us.svg') }}" alt="US Flag" class="w-5 h-4 object-cover">
                        <span>English</span>
                    </x-dropdowns.item>
                </x-slot>
            </x-dropdowns.main>

            <!-- Theme Toggle Button -->
            <div class="relative w-9 h-9 ">
                <a href="javascript:void(0)"
                    class="rounded-full border flex items-center justify-center dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-800"
                    @click="darkMode = !darkMode">
                    <span class="flex justify-center items-center size-9 relative">
                        <x-icons.theme-toggle :isDarkMode="false" />
                        <x-icons.theme-toggle :isDarkMode="true" />
                    </span>
                </a>
            </div>
            
            <!-- Notification Dropdown -->
            <x-dropdowns.main align="right" width="300px">
                <x-slot name="trigger">
                    <a href="javascript:void(0);" class="relative w-9 h-9 rounded-full border flex items-center justify-center hover:bg-gray-200 dark:border-gray-700 dark:text-neutral-200 dark:hover:bg-gray-800">
                        <x-icons.bell />
                        <span class="absolute inline-flex items-center justify-center text-white text-[11px] font-medium bg-red-400 w-2 h-2 rounded-full -top-[1px] -right-[2px]">
                            <span class="absolute inline-flex items-center justify-center text-white text-[11px] font-medium animate-ping bg-red-400 opacity-75 w-2 h-2 rounded-full"></span>
                        </span>
                    </a>
                </x-slot>
                <x-slot name="content">
                    <div class="p-2">
                        <div class="notification-header flex items-center justify-between px-6 py-3 border-b dark:border-b-gray-700">
                            <h3 class="text-gray-500 dark:text-gray-300 font-semibold text-base">
                                {{ __('dashboard.notifications.title') }}
                            </h3>
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
                                                        {{ __('dashboard.notifications.permission_request', [
                                                            'name' => 'Terry Franci',
                                                            'project' => 'Project - Nganter App'
                                                        ]) }}
                                                    </p>
                                                </div>
                                                <div class="flex items-center mt-1 text-xs text-gray-400 dark:text-gray-500">
                                                    <span>{{ __('dashboard.notifications.project') }}</span>
                                                    <span class="mx-1">•</span>
                                                    <span>{{ __('dashboard.notifications.time_ago', ['time' => '5 min']) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endfor
                        </ul>
                        <div class="p-2 border-gray-100 dark:border-gray-700 notification-footer">
                            <a href="#" class="block w-full py-2 px-4 text-center text-gray-500 dark:text-gray-300 font-medium border border-gray-200 dark:border-gray-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors view-all-btn">
                                {{ __('dashboard.notifications.view_all') }}
                            </a>
                        </div>
                    </div>
                </x-slot>
            </x-dropdowns.main>
            
            <!-- User Profile Dropdown -->
            <x-dropdowns.main align="right" width="200px">
                <x-slot name="trigger">
                    <a class="relative cursor-pointer align-middle w-9 h-9 rounded-full">
                        <x-forms.img :width="36" :height="36" class="rounded-full" />
                    </a>
                </x-slot>
                <x-slot name="content">
                    <x-dropdowns.item href="javascript:void(0);" icon="user">
                        <p class="text-sm">{{ __('dashboard.profile.my_profile') }}</p>
                    </x-dropdowns.item>
                    <x-dropdowns.item href="javascript:void(0);" icon="mail">
                        <p class="text-sm">{{ __('dashboard.profile.my_account') }}</p>
                    </x-dropdowns.item>
                    <x-dropdowns.item href="javascript:void(0);" icon="list-check">
                        <p class="text-sm">{{ __('dashboard.profile.my_task') }}</p>
                    </x-dropdowns.item>
                    <div class="px-4 mt-[7px] grid place-items-center">
                        <x-forms.form method="POST" action="{{ route('logout') }}" classes="">
                            <x-buttons.gradient type="submit">
                                {{ __('dashboard.profile.logout') }}
                            </x-buttons.gradient>
                        </x-forms.form>
                    </div>
                </x-slot>
            </x-dropdowns.main>
        </div>
    </nav>
</header>