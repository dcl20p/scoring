@php
    $defaults = [
        'type' => 'submit',
        'class' => 'w-full px-8 h-12 bg-blue-500 hover:bg-blue-600 text-white rounded-full font-medium shadow-sm transition-colors'
    ];
@endphp

<div class="flex justify-center mt-6">
    <button {{ $attributes->merge($defaults) }}>{{ $slot }}</button>
</div>