@props(['route' => 'login'])

<div class="text-center text-sm">
    {{ __($route == 'register' ? 'auth.already_have_account' : 'auth.no_account') }}
    <a 
        href="{{ route($route == 'register' ? 'login' : 'register') }}" 
        class="text-primary font-medium hover:underline transition-colors"
    >
        {{ __($route == 'register' ? 'auth.sign_in' : 'auth.create_account') }}
    </a>
</div>