@props(['href' => 'javascript:void(0)', 'icon' => null])

<a href="{{ $href }}" {{ $attributes->merge([
    'class' => 'flex items-center gap-2 hover:bg-gray-100 px-4 py-1.5 
                dark:hover:bg-gray-700 text-gray-500 dark:text-gray-300'
    ]) }}>
    @if($icon)
        <i class="ti ti-{{ $icon }} text-lg"></i>
    @endif
    {{ $slot }}
</a>