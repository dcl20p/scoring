@props(['size' => 'text-2xl'])

<div class="font-semibold text-primary {{ $size }} tracking-tight">
    {{ config('app.name') }}
</div>