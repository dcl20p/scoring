<x-guest-layout>
    <div class="max-w-xl mx-auto">
        <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md">
            <div class="mb-6 text-center">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                    {{ __('auth.verify_email_title') }}
                </h2>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('auth.verify_email_description') }}
                </p>
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 text-sm font-medium text-green-600 dark:text-green-400">
                    {{ __('auth.verification_link_sent') }}
                </div>
            @endif

            <div class="flex items-center justify-between mt-4">
                <x-forms.form action="{{ route('verification.send') }}">
                    <x-buttons.gradient type="submit" theme="green_blue">
                        {{ __('auth.resend_verification_email') }}
                    </x-buttons.gradient>
                </x-forms.form>

                <x-forms.form action="{{ route('logout') }}">
                    <x-buttons.gradient>
                        {{ __('dashboard.profile.logout') }}
                    </x-buttons.gradient>
                </x-forms.form>
            </div>
        </div>
    </div>
</x-guest-layout>