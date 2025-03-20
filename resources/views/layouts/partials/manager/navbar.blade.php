
<aside id="sidebar" class="w-[270px] bg-white border border-gray-200 dark:bg-black/100 dark:border-gray-800 top-0 left-0 with-vertical transform -translate-x-full xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed xl:top-5 xl:left-auto shrink-0 h-screen z-[999] shadow-md xl:rounded-md  transition-all duration-300  ease-in-out hs-overlay hs-overlay-open:translate-x-0 left-sidebar">
    <div class="p-4 flex items-center justify-center">
        <a href="/">
            <x-logo size="text-3xl"/>
        </a>
    </div>
    <div class="scroll-sidebar" data-simplebar="">
        <nav class="sidebar-nav w-full flex flex-col px-4 mt-5">
            <ul id="sidebarnav" class="text-sm">
                <x-sidebar.group-title>
                    HOME
                </x-sidebar.group-title>

                <li class="sidebar-item">
                    <a class="sidebar-link gap-3 py-2.5 my-1 text-gray-500 text-base font-bold flex items-center relative  rounded-md w-full  active"
                        href="@@webRoot/index.html">
                        <i class="ti ti-layout-dashboard ps-2  text-2xl"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li class="text-xs font-bold mb-4 mt-6">
                    <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                    <span class="text-xs text-gray-400 font-bold">UI COMPONENTS</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link gap-3 py-2.5 my-1 text-gray-500 text-base font-bold  flex items-center relative  rounded-md w-full"
                        href="@@webRoot/components/buttons.html">
                        <i class="ti ti-article ps-2 text-2xl"></i> <span>Buttons</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link gap-3 py-2.5 my-1 text-gray-500 text-base font-bold  flex items-center relative rounded-md w-full"
                        href="@@webRoot/components/alerts.html">
                        <i class="ti ti-alert-circle ps-2 text-2xl"></i> <span>Alerts</span>
                    </a>
                </li>
                <!-- Menu Item Group Start -->
                <li class="sidebar-item" x-data="{ open: false }">
                    <button class="sidebar-link gap-3 py-2.5 my-1 text-gray-500 text-base font-bold flex items-center justify-between relative rounded-md w-full" @click="open = !open">
                        <div class="flex items-center">
                            <i class="ti ti-layout-grid ps-2 text-2xl"></i>
                            <span class="ml-3">Components</span>
                        </div>
                        <i class="ti ti-chevron-down transition-transform mr-2" :class="{'rotate-180': open}"></i>
                    </button>
                    <ul x-show="open" x-transition class="pl-6 pb-1 pt-2" style="display: none;">
                        <li class="sidebar-sub-item">
                            <a class="sidebar-link gap-2 py-2 my-1 text-gray-500 text-sm flex items-center relative rounded-md w-full"
                               href="@@webRoot/components/alerts.html">
                                <i class="ti ti-point text-xl"></i> <span>Alerts</span>
                            </a>
                        </li>
                        <li class="sidebar-sub-item">
                            <a class="sidebar-link gap-2 py-2 my-1 text-gray-500 text-sm flex items-center relative rounded-md w-full"
                               href="@@webRoot/components/cards.html">
                                <i class="ti ti-point text-xl"></i> <span>Cards</span>
                            </a>
                        </li>
                        <li class="sidebar-sub-item">
                            <a class="sidebar-link gap-2 py-2 my-1 text-gray-500 text-sm flex items-center relative rounded-md w-full"
                               href="@@webRoot/components/forms.html">
                                <i class="ti ti-point text-xl"></i> <span>Forms</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Menu Item Group End -->

                <!-- Nested Menu Item Group Start -->
                <li class="sidebar-item" x-data="{ open: false, subOpen: false }">
                    <button class="sidebar-link gap-3 py-2.5 my-1 text-gray-500 text-base font-bold flex items-center justify-between relative rounded-md w-full" @click="open = !open">
                        <div class="flex items-center">
                            <i class="ti ti-chart-bar ps-2 text-2xl"></i>
                            <span class="ml-3">Data Visualization</span>
                        </div>
                        <i class="ti ti-chevron-down transition-transform mr-2" :class="{'rotate-180': open}"></i>
                    </button>
                    <ul x-show="open" x-transition class="pl-6 pb-1 pt-2" style="display: none;">
                        <li class="sidebar-sub-item">
                            <a class="sidebar-link gap-2 py-2 my-1 text-gray-500 text-sm flex items-center relative rounded-md w-full"
                               href="@@webRoot/charts/line-charts.html">
                                <i class="ti ti-point text-xl"></i> <span>Line Charts</span>
                            </a>
                        </li>
                        <li class="sidebar-sub-item">
                            <a class="sidebar-link gap-2 py-2 my-1 text-gray-500 text-sm flex items-center relative rounded-md w-full"
                               href="@@webRoot/charts/bar-charts.html">
                                <i class="ti ti-point text-xl"></i> <span>Bar Charts</span>
                            </a>
                        </li>
                        <li class="sidebar-sub-item" x-data="{ subOpen: false }">
                            <button class="sidebar-link gap-2 py-2 my-1 text-gray-500 text-sm flex items-center justify-between relative rounded-md w-full" @click.stop="subOpen = !subOpen">
                                <div class="flex items-center">
                                    <i class="ti ti-point text-xl"></i>
                                    <span>Advanced Charts</span>
                                </div>
                                <i class="ti ti-chevron-down transition-transform text-sm mr-2" :class="{'rotate-180': subOpen}"></i>
                            </button>
                            <ul x-show="subOpen" x-transition class="pl-4 pb-1 pt-1" style="display: none;">
                                <li class="sidebar-sub-item">
                                    <a class="sidebar-link gap-2 py-1.5 my-1 text-gray-500 text-xs flex items-center relative rounded-md w-full"
                                       href="@@webRoot/charts/advanced/heatmap.html">
                                        <i class="ti ti-point-filled text-sm"></i> <span>Heatmap</span>
                                    </a>
                                </li>
                                <li class="sidebar-sub-item">
                                    <a class="sidebar-link gap-2 py-1.5 my-1 text-gray-500 text-xs flex items-center relative rounded-md w-full"
                                       href="@@webRoot/charts/advanced/radar.html">
                                        <i class="ti ti-point-filled text-sm"></i> <span>Radar</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-sub-item" x-data="{ subOpen: false }">
                            <button class="sidebar-link gap-2 py-2 my-1 text-gray-500 text-sm flex items-center justify-between relative rounded-md w-full" @click.stop="subOpen = !subOpen">
                                <div class="flex items-center">
                                    <i class="ti ti-point text-xl"></i>
                                    <span>Advanced Charts</span>
                                </div>
                                <i class="ti ti-chevron-down transition-transform text-sm mr-2" :class="{'rotate-180': subOpen}"></i>
                            </button>
                            <ul x-show="subOpen" x-transition class="pl-4 pb-1 pt-1" style="display: none;">
                                <li class="sidebar-sub-item">
                                    <a class="sidebar-link gap-2 py-1.5 my-1 text-gray-500 text-xs flex items-center relative rounded-md w-full"
                                       href="@@webRoot/charts/advanced/heatmap.html">
                                        <i class="ti ti-point-filled text-sm"></i> <span>Heatmap</span>
                                    </a>
                                </li>
                                <li class="sidebar-sub-item">
                                    <a class="sidebar-link gap-2 py-1.5 my-1 text-gray-500 text-xs flex items-center relative rounded-md w-full"
                                       href="@@webRoot/charts/advanced/radar.html">
                                        <i class="ti ti-point-filled text-sm"></i> <span>Radar</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- Nested Menu Item Group End -->

                <li class="sidebar-item">
                    <a class="sidebar-link gap-3 py-2.5 my-1 text-gray-500 text-base font-bold flex items-center relative  rounded-md w-full"
                        href="@@webRoot/components/cards.html">
                        <i class="ti ti-cards ps-2 text-2xl"></i> <span>Card</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link gap-3 py-2.5 my-1 text-gray-500 text-base font-bold  flex items-center relative  rounded-md w-full"
                        href="@@webRoot/components/forms.html">
                        <i class="ti ti-file-description ps-2 text-2xl"></i> <span>Forms</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link gap-3 py-2.5 my-1 text-gray-500 text-base font-bold   flex items-center relative  rounded-md w-full"
                        href="@@webRoot/components/typography.html">
                        <i class="ti ti-typography ps-2 text-2xl"></i> <span>Typography</span>
                    </a>
                </li>

                <li class="text-xs font-bold mb-4 mt-8">
                    <i class="ti ti-dots nav-small-cap-icon  text-lg hidden text-center"></i>
                    <span class="text-xs text-gray-400 font-bold">AUTH</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link gap-3 py-2.5 my-1 text-gray-500 text-base   flex items-center relative  rounded-md w-full"
                        href="@@webRoot/pages/authentication-login.html">
                        <i class="ti ti-login ps-2 text-2xl"></i> <span>Login</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link gap-3 py-2.5 my-1 text-gray-500 text-base   flex items-center relative  rounded-md w-full"
                        href="@@webRoot/pages/authentication-register.html">
                        <i class="ti ti-user-plus ps-2 text-2xl"></i> <span>Register</span>
                    </a>
                </li>

                <li class="text-xs font-bold mb-4 mt-8">
                    <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                    <span class="text-xs text-gray-400 font-bold">EXTRA</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link gap-3 py-2.5 my-1 text-gray-500 text-base   flex items-center relative  rounded-md w-full"
                        href="@@webRoot/pages/icons.html">
                        <i class="ti ti-mood-happy ps-2 text-2xl"></i> <span>Icons</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link gap-3 py-2.5 my-1 text-gray-500 text-base   flex items-center relative  rounded-md w-full"
                        href="@@webRoot/pages/sample-page.html">
                        <i class="ti ti-aperture ps-2 text-2xl"></i> <span>Sample Page</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="m-4  relative grid">
        <button class="text-base font-bold hover:bg-blue-700 btn">Upgrade to Pro</button>
    </div>
</aside>