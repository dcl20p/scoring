@props(['classes' => 'space-y-4'])

<form {{ $attributes->merge(['class' => $classes]) }}>
    @if ($attributes->get('method', 'GET') !== 'GET')
        @csrf
        @method($attributes->get('method'))
    @endif

    {{ $slot }}
</form>