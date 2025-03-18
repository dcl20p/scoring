@props(['for'])

<label for="{{ $for }}" {{ $attributes->merge(['class' => 'block font-medium text-gray-700']) }}>
    {{ $slot }}
</label>
