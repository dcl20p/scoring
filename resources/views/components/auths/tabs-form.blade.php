@props(['type' => 'admin', 'route' => 'login'])

<div x-show="activeTab === '{{ $type }}'">
    <x-forms.form method="POST" action="{{ route($route) }}">
        
        <input type="hidden" name="role" value="{{ $type }}">

        @if ($route == 'register')
            <div class="grid grid-cols-2 gap-4">
                <x-forms.input id="first_name" name="first_name" id="first_name-{{ $type }}" label="{{ __('auth.first_name') }}" 
                    placeholder="John" required autocomplete="given-name"/>

                <x-forms.input id="last_name" name="last_name" id="last_name-{{ $type }}" label="{{ __('auth.last_name') }}" 
                    placeholder="Doe" required autocomplete="given-name"/>
            </div>
        @endif

        <x-forms.input id="email-{{ $type }}" name="email" type="email" label="Email" 
            placeholder="{{ $type }}@example.com" required autocomplete="email"/>

        @if ($route == 'register')
            <x-forms.phone-group name="phone" id="phone-{{ $type }}" label="{{ __('auth.phone') }}"/>
        @endif

        <div x-data="{ 
            showPassword: false,
            password: '',
            passwordRequirements: {
                length: false,
                uppercase: false,
                lowercase: false,
                number: false
            },
            checkPasswordRequirements() {
                this.passwordRequirements.length = this.password.length >= 8;
                this.passwordRequirements.uppercase = /[A-Z]/.test(this.password);
                this.passwordRequirements.lowercase = /[a-z]/.test(this.password);
                this.passwordRequirements.number = /[0-9]/.test(this.password);
            }
        }">
            <x-forms.password-group route="{{ $route }}" id="password-{{ $type }}" name="password" x-bind:type="showPassword ? 'text' : 'password'">
                @if($route == 'register')
                    <div class="grid grid-cols-2 gap-2 mt-2">
                        <div class="flex items-center gap-1.5 text-xs" :class="passwordRequirements.length ? 'text-green-600' : 'text-gray-500'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            {{ __('auth.password_min_length') }}
                        </div>
                        <div class="flex items-center gap-1.5 text-xs" :class="passwordRequirements.uppercase ? 'text-green-600' : 'text-gray-500'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            {{ __('auth.password_uppercase') }}
                        </div>
                        <div class="flex items-center gap-1.5 text-xs" :class="passwordRequirements.lowercase ? 'text-green-600' : 'text-gray-500'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            {{ __('auth.password_lowercase') }}
                        </div>
                        <div class="flex items-center gap-1.5 text-xs" :class="passwordRequirements.number ? 'text-green-600' : 'text-gray-500'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            {{ __('auth.password_number') }}
                        </div>
                    </div>
                @endif
                
                <x-forms.error :error="$errors->first('password')" />
            </x-forms.password-group>
        </div>

        @if ($route == 'register')
            <x-forms.password-group route="{{ $route }}" id="password_confirmation-{{ $type }}" x-bind:type="showPassword ? 'text' : 'password'"
                label="{{ __('auth.confirm_password') }}" name="password_confirmation" passType="confirm"/>
        @else
            <x-forms.remember-me typeRole="{{ $type }}" name="remember-me" />
        @endif

        
        <x-forms.button>
            {{ __($route == 'register' ? "auth.register_button_$type" : "auth.login_button_$type") }}
        </x-forms.button>
    </x-forms.form>
</div>