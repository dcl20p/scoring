@props(['icon' => 'dots-vertical'])

<a href="javascript:void(0);" {{ $attributes->merge(['class' => 'rounded-full p-2 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-800']) }}>
    @if($slot->isEmpty())
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="1"></circle>
            <circle cx="12" cy="5" r="1"></circle>
            <circle cx="12" cy="19" r="1"></circle>
        </svg>
    @else
        {{ $slot }}
    @endif
</a>