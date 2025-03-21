<aside id="sidebar" class="w-[270px] bg-white border border-gray-200 dark:bg-black/100 dark:border-gray-800 top-0 left-0 with-vertical transform -translate-x-full xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed xl:top-5 xl:left-auto shrink-0 h-screen z-[999] shadow-md xl:rounded-md transition-all duration-300 ease-in-out hs-overlay hs-overlay-open:translate-x-0 left-sidebar">
    <div class="p-4 flex items-center justify-center">
        <a href="/">
            <x-logo size="text-3xl"/>
        </a>
    </div>
    <div class="scroll-sidebar" data-simplebar="">
        <nav class="sidebar-nav w-full flex flex-col px-4 mt-5">
            <ul id="sidebarnav" class="text-sm">
                <x-sidebar.group-title>HOME</x-sidebar.group-title>

                <x-sidebar.nav-item 
                    href="#"
                    icon="layout-dashboard">
                    Dashboard
                </x-sidebar.nav-item>

                <x-sidebar.group-title>UI COMPONENTS</x-sidebar.group-title>

                <x-sidebar.nav-item 
                    href="#"
                    icon="article">
                    Buttons
                </x-sidebar.nav-item>

                <x-sidebar.nav-item 
                    href="#"
                    icon="alert-circle">
                    Alerts
                </x-sidebar.nav-item>

                <x-sidebar.nav-dropdown icon="layout-grid" title="Components">
                    <x-sidebar.sub-item href="#">
                        Alerts
                    </x-sidebar.sub-item>
                    <x-sidebar.sub-item href="#">
                        Cards
                    </x-sidebar.sub-item>
                    <x-sidebar.sub-item href="#">
                        Forms
                    </x-sidebar.sub-item>
                </x-sidebar.nav-dropdown>

                <x-sidebar.nav-dropdown icon="chart-bar" title="Data Visualization">
                    <x-sidebar.sub-item href="#" icon="point">
                        Line Charts
                    </x-sidebar.sub-item>
                    <x-sidebar.sub-item href="#" icon="point">
                        Bar Charts
                    </x-sidebar.sub-item>
                    
                    <x-sidebar.nested-sub-item icon="point" title="Advanced Charts">
                        <x-sidebar.sub-item href="#" icon="point-filled">
                            Heatmap
                        </x-sidebar.sub-item>
                        <x-sidebar.sub-item href="#" icon="point-filled">
                            Radar
                        </x-sidebar.sub-item>
                    </x-sidebar.nested-sub-item>
                </x-sidebar.nav-dropdown>

                <x-sidebar.nav-item 
                    href="#"
                    icon="cards">
                    Card
                </x-sidebar.nav-item>

                <x-sidebar.nav-item 
                    href="#"
                    icon="file-description">
                    Forms
                </x-sidebar.nav-item>

                <x-sidebar.nav-item 
                    href="#"
                    icon="typography">
                    Typography
                </x-sidebar.nav-item>

                <x-sidebar.group-title>AUTH</x-sidebar.group-title>

                <x-sidebar.nav-item 
                    href="#"
                    icon="login">
                    Login
                </x-sidebar.nav-item>

                <x-sidebar.nav-item 
                    href="#"
                    icon="user-plus">
                    Register
                </x-sidebar.nav-item>

                <x-sidebar.group-title>EXTRA</x-sidebar.group-title>

                <x-sidebar.nav-item 
                    href="#"
                    icon="mood-happy">
                    Icons
                </x-sidebar.nav-item>

                <x-sidebar.nav-item 
                    href="#"
                    icon="aperture">
                    Sample Page
                </x-sidebar.nav-item>
            </ul>
        </nav>
    </div>
    <div class="m-4 relative grid">
        <button class="text-base font-bold hover:bg-blue-700 btn">Upgrade to Pro</button>
    </div>
</aside>