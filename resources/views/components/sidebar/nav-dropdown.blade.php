@props(['icon', 'title'])

<li class="sidebar-item" x-data="{ open: false }">
    <button class="sidebar-link gap-3 py-2.5 my-1 text-gray-500 text-base font-bold flex items-center justify-between relative rounded-md w-full" 
            @click="open = !open">
        <div class="flex items-center">
            <i class="ti ti-{{ $icon }} ps-2 text-2xl"></i>
            <span class="ml-3">{{ $title }}</span>
        </div>
        <i class="ti ti-chevron-down transition-transform mr-2" :class="{'rotate-180': open}"></i>
    </button>
    <ul x-show="open" 
        x-transition 
        class="pl-6 pb-1 pt-2" 
        style="display: none;">
        {{ $slot }}
    </ul>
</li>