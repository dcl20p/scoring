@props(['type' => 'text', 'label', 'name', 'id'])

@php
    $defaults = [
        'type' => $type,
        'id' => $id,
        'name' => $name,
        'class' => 'w-full h-12 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent',
        'value' => old($name)
    ];
@endphp

<x-forms.field :$label :$name :$id>
    <input {{ $attributes->merge($defaults) }}>
</x-forms.field>