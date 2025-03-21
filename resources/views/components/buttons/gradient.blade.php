@props([
    'href' => null,
    'type' => 'button',
    'gradientFrom' => 'pink-500',
    'gradientTo' => 'orange-400'
])

@php
    $baseClasses = "relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800";
    $gradientClasses = "from-{$gradientFrom} to-{$gradientTo} group-hover:from-{$gradientFrom} group-hover:to-{$gradientTo}";
    $innerClasses = "relative w-full px-5 py-2.5 font-bold text-gray-500 dark:text-gray-300 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-transparent group-hover:dark:bg-transparent";
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $baseClasses . ' ' . $gradientClasses]) }}>
        <span class="{{ $innerClasses }}">
            {{ $slot }}
        </span>
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $baseClasses . ' ' . $gradientClasses]) }}>
        <span class="{{ $innerClasses }}">
            {{ $slot }}
        </span>
    </button>
@endif