@props(['label' => '', 'name', 'id'])

<div class="space-y-2">
    @if ($label)
        <x-forms.label for="{{ $id }}">{{ $label }}</x-forms.label>
    @endif
    <div class="relative">
        <x-forms.phone-input id="{{ $id }}" name="{{ $name }}" autocomplete="tel" placeholder="+84 123 456 789"/>
    </div>

    <x-forms.error :error="$errors->first($name)" />
</div>