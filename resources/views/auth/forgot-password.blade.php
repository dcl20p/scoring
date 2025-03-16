<x-guest-layout>
    <div class="w-full max-w-md animate-fade-in">
        <x-auths.title />

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
            <div class="space-y-6 animate-slide-up">
                <div class="text-center space-y-2 mb-2">
                    <h1 class="text-2xl font-semibold tracking-tigh">
                        {{ __('passwords.reset_confirm_button') }}
                    </h1>
                    <p class="text-muted-foreground text-sm">
                        {{ __('passwords.reset_password_instruction') }}
                    </p>
                </div>

                <x-forms.form method="POST" action="{{ route('password.reset') }}">
                    <x-forms.input id="email" name="email" type="email" label="Email" 
                        placeholder="your@example.com" required autocomplete="email"/>

                    <x-forms.button>
                        {{ __('passwords.send_reset_link') }}
                    </x-forms.button>
                </x-forms.form>

                <div class="text-center text-sm mt-4">
                    <a 
                        href="{{ route('login') }}" 
                        class="text-primary font-medium hover:underline transition-colors"
                    >
                        {{ __('passwords.back_to_login') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>