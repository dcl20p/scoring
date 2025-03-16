@php
    $defaults = [
        'type' => 'submit',
        'class' => 'w-full h-12 mt-6 bg-primary text-white rounded-3xl hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-colors'
    ];
@endphp

<button {{ $attributes->merge($defaults) }}>{{ $slot }}</button>