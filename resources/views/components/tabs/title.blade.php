@props(['route' => 'login'])

<div class="mb-8 text-center">
    <div class="inline-block mb-6">
        <a href="{{ route('landing') }}" class="block">
            <x-logo size="text-3xl"/>
        </a>
    </div>
    <h2 class="text-xl font-medium text-gray-700">
        {{ __('auth.subtitle') }}
    </h2>
</div>
