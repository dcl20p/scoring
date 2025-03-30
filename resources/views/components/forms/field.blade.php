@props([
    'label',
    'name',
    'id',
    'type' => 'text',
    'placeholder' => '',
    'autocomplete' => null,
    'required' => false,
    'classLabel' => '',
    'api' => false
])

<div class="space-y-2 mb-2">
    @if ($label)
        <x-forms.label class="{{ $classLabel }}" for="{{ $id }}">{{ $label }}</x-forms.label>
    @endif

    @if ($type === 'select')
        <x-forms.select :id="$id" :name="$name" :required="$required" {{ $attributes }} >
            {{ $slot }}
        </x-forms.select>
    @else        
        <div class="relative">
            <x-forms.input 
                :id="$id" 
                :name="$name" 
                :type="$type"
                :placeholder="$placeholder"
                :autocomplete="$autocomplete"
                :required="$required"
                {{ $attributes }}
            >
                <x-slot name="showError">
                    <x-forms.error :error="$errors->first($name)" name="{{ $name }}" :api="$api"/>
                </x-slot>
            </x-forms.input>
            {{ $slot }}
        </div>
    @endif
</div>
