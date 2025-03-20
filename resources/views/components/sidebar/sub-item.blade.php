@props(['href', 'icon' => 'point'])

<li class="sidebar-sub-item">
    <a href="{{ $href }}" 
       {{ $attributes->merge(['class' => 'sidebar-link gap-2 py-2 my-1 text-gray-500 text-sm flex items-center relative rounded-md w-full']) }}>
        <i class="ti ti-{{ $icon }} text-xl"></i>
        <span>{{ $slot }}</span>
    </a>
</li>