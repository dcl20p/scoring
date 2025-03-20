@props(['icon' => 'point', 'title'])

<li class="sidebar-sub-item" x-data="{ subOpen: false }">
    <button class="sidebar-link gap-2 py-2 my-1 text-gray-500 text-sm flex items-center justify-between relative rounded-md w-full" 
            @click.stop="subOpen = !subOpen">
        <div class="flex items-center">
            <i class="ti ti-{{ $icon }} text-xl"></i>
            <span>{{ $title }}</span>
        </div>
        <i class="ti ti-chevron-down transition-transform text-sm mr-2" :class="{'rotate-180': subOpen}"></i>
    </button>
    <ul x-show="subOpen" x-transition class="pl-4 pb-1 pt-1" style="display: none;">
        {{ $slot }}
    </ul>
</li>