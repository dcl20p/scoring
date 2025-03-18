<x-guest-layout>
    <div class="w-full max-w-md animate-fade-in">
        <x-auths.title />

        <div class="bg-white rounded-xl shadow-md border border-gray-100 p-8">
            <div class="space-y-6 animate-slide-up">
                
                <x-auths.tabs-header>

                    <x-forms.form method="POST" action="{{ route('login') }}">
                        <x-forms.field 
                            id="email" 
                            name="email" 
                            label="Email" 
                            type="email" 
                            placeholder="your@example.com" 
                            required 
                            autocomplete="email" 
                        />
                    
                        <x-forms.field 
                            id="password" 
                            name="password" 
                            label="{{ __('auth.confirm_password') }}" 
                            type="password" 
                            placeholder="••••••••" 
                            required 
                            autocomplete="new_password"
                        />

                        <x-forms.remember-me name="remember-me" />

                        <x-forms.button>
                            {{ __('auth.login_button') }}
                        </x-forms.button>

                    </x-forms.form>


                </x-auths.tabs-header>

                <x-auths.tabs-footer />
            </div>
        </div>
    </div>
</x-guest-layout>