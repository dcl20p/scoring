@props(['route', 'active' => false])

@php
    $classes = 'text-md font-semibold text-gray-700 hover:text-primary transition-colors';
    if ($active) {
        $classes .= ' text-primary';
    }
@endphp

<a href="{{ route($route) }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>