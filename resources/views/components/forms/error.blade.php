@props(['error' => false])

@if ($error)
    <p class="text-red-500 text-xs mb-1">{{ $error }}</p>
@endif