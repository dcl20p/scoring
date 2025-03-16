<div x-data="{ open: false }" class="relative">
    <button 
        @click="open = !open" 
        class="flex items-center gap-2 px-3 py-2 bg-gray-50/90 rounded-md border border-gray-200 shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-100/90 transition-colors focus:outline-none"
    >
        @if(app()->getLocale() == 'en')
            <img src="{{ asset('images/flags/us.svg') }}" alt="US Flag" class="w-5 h-4 object-cover">
        @else
            <img src="{{ asset('images/flags/vn.svg') }}" alt="Vietnam Flag" class="w-5 h-4 object-cover">
        @endif
        <span class="hidden sm:inline">{{ app()->getLocale() == 'en' ? 'English' : 'Tiếng Việt' }}</span>
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
        <a href="{{ route('language.change', 'vi') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ app()->getLocale() == 'vi' ? 'bg-gray-100 font-medium' : '' }}">
            <img src="{{ asset('images/flags/vn.svg') }}" alt="Vietnam Flag" class="w-5 h-4 object-cover">
            <span>Tiếng Việt</span>
        </a>
        <a href="{{ route('language.change', 'en') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ app()->getLocale() == 'en' ? 'bg-gray-100 font-medium' : '' }}">
            <img src="{{ asset('images/flags/us.svg') }}" alt="US Flag" class="w-5 h-4 object-cover">
            <span>English</span>
        </a>
    </div>
</div>