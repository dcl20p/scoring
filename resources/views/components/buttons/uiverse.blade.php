@props([
    'href' => null,
    'type' => 'button'
])

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => 'uiverse']) }}>
        <div class="wrapper">
            <span>{{ $slot }}</span>
            @for($i = 12; $i >= 1; $i--)
                <div class="circle circle-{{ $i }}"></div>
            @endfor
        </div>
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => 'uiverse']) }}>
        <div class="wrapper">
            <span>{{ $slot }}</span>
            @for($i = 12; $i >= 1; $i--)
                <div class="circle circle-{{ $i }}"></div>
            @endfor
        </div>
    </button>
@endif