<x-guest-layout>
    <div class="w-full max-w-4xl mx-auto p-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
            @include('pages.breadcumbs')

            <h1 class="text-3xl font-semibold mb-6 text-center">{{ __('terms.title') }}</h1>
            
            <div class="prose max-w-none">
                <p class="text-gray-500 mb-8">{{ __('terms.last_updated') }}: {{ date('F d, Y') }}</p>
                
                <div class="space-y-6">
                    <div>
                        <h2 class="text-xl font-medium text-gray-900 mb-3">{{ __('terms.acceptance_title') }}</h2>
                        <p class="text-gray-700">{{ __('terms.acceptance_text') }}</p>
                    </div>
                    
                    <div>
                        <h2 class="text-xl font-medium text-gray-900 mb-3">{{ __('terms.description_title') }}</h2>
                        <p class="text-gray-700">{{ __('terms.description_text') }}</p>
                    </div>
                    
                    <div>
                        <h2 class="text-xl font-medium text-gray-900 mb-3">{{ __('terms.registration_title') }}</h2>
                        <p class="text-gray-700">{{ __('terms.registration_text') }}</p>
                    </div>
                    
                    <div>
                        <h2 class="text-xl font-medium text-gray-900 mb-3">{{ __('terms.privacy_title') }}</h2>
                        <p class="text-gray-700">
                            {{ __('terms.privacy_text') }} 
                            <a href="{{ route('privacy') }}" class="text-primary hover:underline">{{ __('terms.privacy_link') }}</a>.
                        </p>
                    </div>
                    
                    <div>
                        <h2 class="text-xl font-medium text-gray-900 mb-3">{{ __('terms.conduct_title') }}</h2>
                        <p class="text-gray-700">{{ __('terms.conduct_text') }}</p>
                    </div>
                    
                    <div>
                        <h2 class="text-xl font-medium text-gray-900 mb-3">{{ __('terms.changes_title') }}</h2>
                        <p class="text-gray-700">{{ __('terms.changes_text') }}</p>
                    </div>
                    
                    <div>
                        <h2 class="text-xl font-medium text-gray-900 mb-3">{{ __('terms.termination_title') }}</h2>
                        <p class="text-gray-700">{{ __('terms.termination_text') }}</p>
                    </div>
                    
                    <div>
                        <h2 class="text-xl font-medium text-gray-900 mb-3">{{ __('terms.disclaimer_title') }}</h2>
                        <p class="text-gray-700">{{ __('terms.disclaimer_text') }}</p>
                    </div>
                    
                    <div>
                        <h2 class="text-xl font-medium text-gray-900 mb-3">{{ __('terms.limitation_title') }}</h2>
                        <p class="text-gray-700">{{ __('terms.limitation_text') }}</p>
                    </div>
                    
                    <div>
                        <h2 class="text-xl font-medium text-gray-900 mb-3">{{ __('terms.governing_title') }}</h2>
                        <p class="text-gray-700">{{ __('terms.governing_text') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>