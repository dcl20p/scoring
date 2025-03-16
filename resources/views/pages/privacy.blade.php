<x-guest-layout>
    <div class="w-full max-w-4xl mx-auto p-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
            @include('pages.breadcumbs')
            
            <h1 class="text-3xl font-semibold text-center mb-6">{{ __('privacy.title') }}</h1>
            
            <div class="prose max-w-none">
                <p class="text-gray-500 mb-8">{{ __('privacy.last_updated') }}: {{ date('F d, Y') }}</p>
                
                <div class="space-y-6">
                    <div>
                        <h2 class="text-xl font-medium text-gray-900 mb-3">{{ __('privacy.collect_title') }}</h2>
                        <p class="text-gray-700">{{ __('privacy.collect_text') }}</p>
                    </div>
                    
                    <div>
                        <h2 class="text-xl font-medium text-gray-900 mb-3">{{ __('privacy.use_title') }}</h2>
                        <p class="text-gray-700">{{ __('privacy.use_text') }}</p>
                    </div>
                    
                    <div>
                        <h2 class="text-xl font-medium text-gray-900 mb-3">{{ __('privacy.share_title') }}</h2>
                        <p class="text-gray-700">{{ __('privacy.share_text') }}</p>
                        <ul class="list-disc pl-5 mt-2 space-y-1">
                            @foreach(__('privacy.share_list') as $item)
                            <li class="text-gray-700">{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <div>
                        <h2 class="text-xl font-medium text-gray-900 mb-3">{{ __('privacy.security_title') }}</h2>
                        <p class="text-gray-700">{{ __('privacy.security_text') }}</p>
                    </div>
                    
                    <div>
                        <h2 class="text-xl font-medium text-gray-900 mb-3">{{ __('privacy.retention_title') }}</h2>
                        <p class="text-gray-700">{{ __('privacy.retention_text') }}</p>
                    </div>
                    
                    <div>
                        <h2 class="text-xl font-medium text-gray-900 mb-3">{{ __('privacy.rights_title') }}</h2>
                        <p class="text-gray-700">{{ __('privacy.rights_text') }}</p>
                    </div>
                    
                    <div>
                        <h2 class="text-xl font-medium text-gray-900 mb-3">{{ __('privacy.policy_changes_title') }}</h2>
                        <p class="text-gray-700">{{ __('privacy.policy_changes_text') }}</p>
                    </div>
                    
                    <div>
                        <h2 class="text-xl font-medium text-gray-900 mb-3">{{ __('privacy.contact_title') }}</h2>
                        <p class="text-gray-700">{{ __('privacy.contact_text') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>