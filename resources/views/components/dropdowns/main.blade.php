@props([
    'align' => 'right', 
    'width' => '150px', 
    'contentClasses' => ''
])

<div class="hs-dropdown relative inline-flex [--placement:bottom-{{ $align }}]">
    {{-- Render trigger section --}}
    @if(isset($trigger))
        {{ $trigger }}
    @else
        <x-dropdowns.trigger />
    @endif

    {{-- Render content section --}}
    <x-dropdowns.menu :align="$align" :width="$width" class="{{ $contentClasses }}">
        @if(isset($content))
            {{ $content }}
        @else
            {{ $slot }}
        @endif
    </x-dropdowns.menu>
</div>