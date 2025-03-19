@props(['width' => 100, 'height' => 100])

<img {{ $attributes->merge(['class' => 'w-full h-full object-cover']) }} 
    src="https://picsum.photos/seed/{{ rand(0, 10000) }}/{{ $width }}/{{ $height }}">