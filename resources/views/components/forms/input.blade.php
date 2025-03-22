@props([
    'type' => 'text',
    'name',
    'id',
    'placeholder' => '',
    'autocomplete' => null,
    'required' => false,
    'passwordStrength' => false
])

@if ($type === 'password' && !$passwordStrength)
    <div x-data="{ showPassword: false }" class="relative">
        <input 
            id="{{ $id }}" 
            name="{{ $name }}" 
            :type="showPassword ? 'text' : 'password'"
            placeholder="{{ $placeholder }}"
            required="{{ $required }}"
            {{ $attributes->merge([
                'class' => 'h-12 w-full px-3 py-2 pr-10 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary'
            ]) }}
            value="{{ old($name) }}"
        >
        <button 
            type="button" tabindex="-1"
            @click="showPassword = !showPassword"
            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700"
        >
            <template x-if="showPassword">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                </svg>
            </template>
            <template x-if="!showPassword">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </template>
        </button>
    </div>

@elseif ($type === 'password' && $passwordStrength)
    <div x-data="{ 
        showPassword: false,
        password: '',
        passwordRequirements: {
            length: false,
            mixedcase: false,
            number: false,
            symbol: false,
        },
        checkPasswordRequirements() {
            this.passwordRequirements.length = this.password.length >= 8;
            this.passwordRequirements.mixedcase = /[A-Z]/.test(this.password) && /[a-z]/.test(this.password);
            this.passwordRequirements.number = /[0-9]/.test(this.password);
            this.passwordRequirements.symbol = /[!@#$%^&*()_+\-=\[\]{};:\\|,.<>\/?]/.test(this.password);
        }
    }">
    <div class="relative">
        <input 
            id="{{ $id }}" 
            name="{{ $name }}" 
            :type="showPassword ? 'text' : 'password'"
            x-model="password"
            @input="checkPasswordRequirements()"
            placeholder="{{ $placeholder }}"
            required="{{ $required }}"
            {{ $attributes->merge([
                'class' => 'h-12 w-full px-3 py-2 pr-10 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary'
            ]) }}
            value="{{ old($name) }}"
        >
        <button 
            type="button" tabindex="-1"
            @click="showPassword = !showPassword"
            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700"
        >
            <template x-if="showPassword">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                </svg>
            </template>
            <template x-if="!showPassword">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </template>
        </button>
    </div>

        <div class="grid grid-cols-2 gap-2 mt-2">
            <div class="flex items-center gap-1 text-xs" :class="passwordRequirements.length ? 'text-green-600' : 'text-gray-500'">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                {{ __('auth.password_min_length') }}
            </div>
            <div class="flex items-center gap-1 text-xs" :class="passwordRequirements.mixedcase ? 'text-green-600' : 'text-gray-500'">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                {{ __('auth.password_mixedcase') }}
            </div>
            <div class="flex items-center gap-1 text-xs" :class="passwordRequirements.symbol ? 'text-green-600' : 'text-gray-500'">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                {{ __('auth.password_symbol') }}
            </div>
            <div class="flex items-center gap-1 text-xs" :class="passwordRequirements.number ? 'text-green-600' : 'text-gray-500'">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                {{ __('auth.password_number') }}
            </div>
        </div>
    </div>

@else
    <input 
        {{ $attributes->merge([
            'type' => $type,
            'id' => $id,
            'name' => $name,
            'placeholder' => $placeholder,
            'autocomplete' => $autocomplete,
            'required' => $required ? 'required' : false,
            'class' => 'w-full h-12 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent'
        ]) }}
        value="{{ old($name) }}"
    />
@endif
