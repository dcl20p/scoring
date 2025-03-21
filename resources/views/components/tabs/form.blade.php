@props(['type' => 'admin'])

<div x-show="activeTab === '{{ $type }}'">
    <x-forms.form method="POST" action="">
        <input type="hidden" name="role" value="{{ strtoupper($type) }}">
        <div class="grid grid-cols-2 gap-4">
            <x-forms.field 
                id="first_name-{{ $type }}" 
                name="first_name" 
                label="{{ __('auth.first_name') }}" 
                type="text" 
                placeholder="John" 
                required 
                autocomplete="given-name" 
            />
            <x-forms.field 
                id="last_name-{{ $type }}" 
                name="last_name" 
                label="{{ __('auth.last_name') }}" 
                type="text" 
                placeholder="Doe" 
                required 
                autocomplete="given-name" 
            />
        </div>

        <x-forms.field 
            id="email-{{ $type }}" 
            name="email" 
            label="Email" 
            type="email" 
            placeholder="{{ $type }}@example.com" 
            required 
            autocomplete="email" 
        />

        <x-forms.phone-group name="phone" id="phone-{{ $type }}" label="{{ __('auth.phone') }}"/>

        <x-forms.field 
            id="password-{{ $type }}" 
            name="password" 
            label="{{ __('auth.password') }}" 
            type="password" 
            placeholder="••••••••" 
            required 
            autocomplete="new_password"
            :passwordStrength="true"
        />

        <x-forms.field 
            id="password_confirmation-{{ $type }}" 
            name="password_confirmation" 
            label="{{ __('auth.confirm_password') }}" 
            type="password" 
            placeholder="••••••••" 
            required 
            autocomplete="new_password"
        />

        <x-forms.field 
            id="registration-code-{{ $type }}" 
            name="registration-code" 
            label="{{ __('auth.admin_code') }}" 
            type="text" 
            placeholder="{{ __('auth.admin_code_prompt') }}" 
            required 
            autocomplete="email" 
        >
            <p class="text-xs text-gray-500 mt-2">
                {{ __('auth.admin_code_help') }}
            </p>
        </x-forms.field>
        
        <x-agree-terms />

        <x-forms.button>
            {{ __("auth.register_button_$type") }}
        </x-forms.button>
    </x-forms.form>
</div>