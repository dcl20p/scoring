@props(['api' => false])

@php
    $defaults = [
        'class' => 'w-full px-8 h-12 bg-blue-500 hover:bg-blue-600 text-white rounded-full font-medium shadow-sm transition-colors  flex items-center justify-center flex items-center justify-center'
    ];
@endphp

<div class="flex justify-center mt-6">
    @if ($api)
        <a href="javascript:void(0);" {{ $attributes->merge($defaults) }}>{{ $slot }}</a>
    @else
        <button {{ $attributes->merge($defaults) }}>{{ $slot }}</button>
    @endif
</div>