@props([
    'href' => null,
    'type' => 'button',
    'theme' => 'pink_orange'
])

@php
    $buttonThemes = [
        'purple_blue' => 'from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 focus:ring-blue-300 dark:focus:ring-blue-800',
        'cyan_blue' => 'from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 focus:ring-cyan-200 dark:focus:ring-cyan-800',
        'green_blue' => 'from-green-400 to-blue-500 group-hover:from-green-400 group-hover:to-blue-500 focus:ring-green-200 dark:focus:ring-green-800',
        'purple_pink' => 'from-purple-500 to-pink-50 group-hover:from-purple-500 group-hover:to-pink-50 focus:ring-purple-200 dark:focus:ring-purple-800',
        'pink_orange' => 'from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 focus:ring-pink-200 dark:focus:ring-pink-800',
        'teal_lime' => 'from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 focus:ring-lime-200 dark:focus:ring-lime-800',
        'red_yellow' => 'from-red-200 via-red-300 to-yellow-200 group-hover:from-red-200 group-hover:via-red-300 group-hover:to-yellow-200 focus:ring-red-100 dark:focus:ring-red-400',
    ];

    $baseClasses = "relative inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-gray-900 hover:text-white dark:text-gray-300 rounded-lg group bg-gradient-to-br focus:ring-4 focus:outline-none";
    $gradientClasses = $buttonThemes[$theme];
    $innerClasses = "relative inline-flex items-center justify-center w-full px-5 py-2.5 font-bold text-gray-500 dark:text-gray-300 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-transparent group-hover:dark:bg-transparent";
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