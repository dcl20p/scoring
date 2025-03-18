
<div class="text-sm text-gray-600 mb-6">
    {{ __('auth.terms_agreement') }} 
    <a href="{{ route('terms') }}" {{ $attributes->merge(['class' => 'text-blue-600 hover:text-blue-500']) }}>
        {{ __('auth.terms_of_service') }}
    </a> 
    {{ __('auth.and') }} 
    <a href="{{ route('privacy') }}" {{ $attributes->merge(['class' => 'text-blue-600 hover:text-blue-500']) }}>
        {{ __('auth.privacy_policy') }}
    </a>
</div>