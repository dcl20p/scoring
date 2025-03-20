@props(['icon', 'href', 'active' => false])

<li class="sidebar-item">
    <a href="{{ $href }}" 
       {{ $attributes->merge([
           'class' => 'sidebar-link gap-3 py-2.5 my-1 text-gray-500 text-base font-bold flex items-center relative rounded-md w-full' . 
                     ($active ? ' active' : '')
       ]) }}>
        <i class="ti ti-{{ $icon }} ps-2 text-2xl"></i>
        <span>{{ $slot }}</span>
    </a>
</li>