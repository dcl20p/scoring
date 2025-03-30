@props([
    'error' => false,
    'api' => false,
    'name'
])

@if ($api)
    <p class="text-xs text-red-500 mb-1 error-message" id="{{ $name }}-error"></p>
@else
    @if ($error)
        <p class="text-red-500 text-xs mb-1">{{ $error }}</p>
    @endif
@endif