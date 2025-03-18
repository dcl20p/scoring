@props(['name'])

<div class="flex items-center justify-between">
    <div class="flex items-center">
        <input 
            id="{{ $name }}" 
            name="{{ $name }}" 
            type="checkbox" 
            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
            @checked(old($name))
        >
        <label for="{{ $name }}" class="ml-2 block text-sm text-gray-700">
            {{ __('auth.remember_me') }}
        </label>
    </div>
    <a href="{{ route('password.request') }}" class="text-xs text-blue-500 hover:underline transition-colors">
        {{ __('auth.forgot_password') }}
    </a>
</div>
