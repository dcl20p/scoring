@props([
    'name',
    'id',
    'options' => [],
    'placeholder' => null,
    'required' => false
])

<select 
    {{ $attributes->merge([
        'id' => $id,
        'name' => $name,
        'placeholder' => $placeholder,
        'required' => $required ? 'required' : false,
        'class' => 'w-full h-12 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent'
    ]) }}
>
    @if ($placeholder)
        <option value="">{{ $placeholder }}</option>
    @endif

    @foreach ($options as $value => $label)
        <option value="{{ $value }}" {{ old($name) == $value ? 'selected' : '' }}>
            {{ $label }}
        </option>
    @endforeach
</select>
