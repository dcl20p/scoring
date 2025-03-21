@props(['class' => 'h-5 w-5'])

<svg xmlns="http://www.w3.org/2000/svg" 
     {{ $attributes->merge(['class' => $class]) }}
     viewBox="0 0 24 24" 
     fill="none" 
     stroke="currentColor" 
     stroke-width="2" 
     stroke-linecap="round" 
     stroke-linejoin="round">
    <line x1="4" y1="8" x2="20" y2="8"></line>
    <line x1="4" y1="16" x2="20" y2="16"></line>
</svg>