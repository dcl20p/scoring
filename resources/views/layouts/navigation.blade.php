<nav class="fixed top-0 left-0 right-0 bg-white backdrop-blur-sm shadow-sm z-50 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
        <a href="{{ route('landing') }}" class="block">
            <x-logo size="text-3xl"/>
        </a>
        
        <div class="flex items-center space-x-4">
            <div class="hidden md:flex items-center space-x-6 mr-4">
                <!-- Main Navigation Menu -->
                <x-nav-link route="terms" :active="($currentRoute = Route::currentRouteName()) === 'terms'">
                    {{ __('layout.terms_heading') }}
                </x-nav-link>
                <x-nav-link route="privacy" :active="$currentRoute === 'privacy'">
                    {{ __('layout.privacy_heading') }}
                </x-nav-link>
                <x-nav-link route="contact" :active="$currentRoute === 'contact'">
                    {{ __('layout.contact_heading') }}
                </x-nav-link>
            </div>
            <!-- Language Switcher Dropdown -->
            <x-lang/>
            
            <!-- Mobile menu button -->
            <button 
                x-data="{ open: false }" 
                @click="open = !open" 
                class="md:hidden p-2 rounded-md text-gray-700 hover:bg-gray-100"
                aria-label="Toggle menu"
            >
                <svg 
                    xmlns="http://www.w3.org/2000/svg" 
                    width="24" 
                    height="24" 
                    viewBox="0 0 24 24" 
                    fill="none" 
                    stroke="currentColor" 
                    stroke-width="2" 
                    stroke-linecap="round" 
                    stroke-linejoin="round"
                    x-show="!open"
                >
                    <line x1="4" x2="20" y1="12" y2="12" />
                    <line x1="4" x2="20" y1="6" y2="6" />
                    <line x1="4" x2="20" y1="18" y2="18" />
                </svg>
                <svg 
                    xmlns="http://www.w3.org/2000/svg" 
                    width="24" 
                    height="24" 
                    viewBox="0 0 24 24" 
                    fill="none" 
                    stroke="currentColor" 
                    stroke-width="2" 
                    stroke-linecap="round" 
                    stroke-linejoin="round"
                    x-show="open"
                >
                    <path d="M18 6 6 18" />
                    <path d="m6 6 12 12" />
                </svg>
                
                <!-- Mobile menu dropdown -->
                <div 
                    x-show="open" 
                    @click.away="open = false"
                    class="absolute top-full left-0 right-0 bg-white shadow-md py-2 px-4 space-y-2 md:hidden"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                >
                    
                    <x-nav-link route="terms" :active="$currentRoute === 'terms'" class="block px-4 py-2 hover:bg-gray-100">
                        {{ __('layout.terms_heading') }}
                    </x-nav-link>
                    <x-nav-link route="privacy" :active="$currentRoute === 'privacy'" class="block px-4 py-2 hover:bg-gray-100">
                        {{ __('layout.privacy_heading') }}
                    </x-nav-link>
                    <x-nav-link route="contact" :active="$currentRoute === 'contact'" class="block px-4 py-2 hover:bg-gray-100">
                        {{ __('layout.contact_heading') }}
                    </x-nav-link>
                    
                    {{-- <a href="{{ route('terms') }}" class="block py-2 text-sm font-medium text-gray-700 hover:text-primary">Terms</a>
                    <a href="{{ route('privacy') }}" class="block py-2 text-sm font-medium text-gray-700 hover:text-primary">Privacy</a>
                    <a href="{{ route('contact') }}" class="block py-2 text-sm font-medium text-gray-700 hover:text-primary">Contact</a> --}}
                </div>
            </button>
        </div>
    </div>
</nav>