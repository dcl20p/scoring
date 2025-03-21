@props(['route' => 'login'])

<div class="space-y-2 text-center">
    <h1 class="text-2xl font-semibold tracking-tight">
        {{ __($route == 'register' ? 'auth.create_account_title' : 'auth.welcome_back') }}
    </h1>
    <p class="text-sm text-gray-500">
        {{ __($route == 'register' ? 'auth.create_prompt' : 'auth.login_prompt') }}
    </p>
</div>

@if ($route == 'login')
    {{ $slot }}
@else
    <div x-data="{ activeTab: 'admin', showPassword: false, showAdminCode: false}">
        <div class="bg-gray-100 rounded-lg p-1 grid grid-cols-2 gap-1 mb-6">
            <button 
                @click="activeTab = 'admin'" 
                :class="{'bg-white shadow-sm': activeTab === 'admin', 'text-gray-500': activeTab !== 'admin'}"
                class="py-2 rounded-md text-sm font-medium transition-all"
            >
                {{ __('auth.role_admin') }}
            </button>
            <button 
                @click="activeTab = 'teacher'" 
                :class="{'bg-white shadow-sm': activeTab === 'teacher', 'text-gray-500': activeTab !== 'teacher'}"
                class="py-2 rounded-md text-sm font-medium transition-all"
            >
                {{ __('auth.role_teacher') }}
            </button>
        </div>

        {{ $slot }}
    </div>
@endif