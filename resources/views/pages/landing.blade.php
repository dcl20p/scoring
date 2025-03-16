<x-guest-layout>
    <div class="w-full flex flex-col">
        <!-- Hero Section -->
        <div class="relative px-6 lg:px-8 py-16 md:py-24 overflow-hidden">
            <div class="absolute inset-0 -z-10">
                <div class="absolute -top-[30%] -left-[10%] w-[70%] h-[70%] rounded-full bg-blue-500/5 blur-3xl"></div>
                <div class="absolute -bottom-[30%] -right-[10%] w-[70%] h-[70%] rounded-full bg-blue-500/5 blur-3xl"></div>
            </div>

            <div class="fixed inset-0 -z-10 overflow-hidden">
                <div class="absolute -top-[30%] -left-[10%] w-[50%] h-[50%] rounded-full bg-purple-500/30 blur-3xl"></div>
                <div class="absolute -bottom-[30%] -right-[10%] w-[50%] h-[50%] rounded-full bg-blue-600/30 blur-3xl"></div>
                <div class="absolute top-[40%] right-[15%] w-[30%] h-[30%] rounded-full bg-pink-500/25 blur-3xl"></div>
            </div>
            
            <div class="mx-auto max-w-5xl">
                <div class="text-center">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl md:text-7xl">
                        {!! __('landing.hero_title') !!}
                    </h1>
                    <p class="mt-6 text-lg leading-8 text-gray-600 max-w-3xl mx-auto">
                        {{ __('landing.hero_description') }}
                    </p>
                    <div class="mt-10 flex items-center justify-center gap-6">
                        <a href="{{ route('register') }}" class="rounded-3xl bg-primary px-5 py-3 text-base font-semibold text-white shadow-sm hover:bg-primary-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary transition-colors">
                            {{ __('landing.get_started') }}
                        </a>
                        <a href="{{ route('login') }}" class="rounded-3xl bg-white px-5 py-3 text-base font-semibold text-primary shadow-sm ring-1 ring-inset ring-primary hover:bg-gray-50 transition-colors">
                            {{ __('landing.sign_in') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- User Types Section -->
        <div class="py-16">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Teacher Card -->
                    <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
                        <h2 class="text-2xl font-bold mb-6">{{ __('landing.for_teachers') }}</h2>
                        <ul class="space-y-4 mb-8">
                            @foreach(__('landing.teacher_features') as $feature)
                            <li class="flex items-start gap-3">
                                <div class="shrink-0 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                                </div>
                                <span>{{ $feature }}</span>
                            </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('register') }}?role=teacher" class="block w-full bg-primary hover:bg-primary-600 text-white text-center py-3 px-4 rounded-3xl transition-colors">
                            {{ __('landing.register_as_teacher') }}
                        </a>
                    </div>
                    
                    <!-- Admin Card -->
                    <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
                        <h2 class="text-2xl font-bold mb-6">{{ __('landing.for_administrators') }}</h2>
                        <ul class="space-y-4 mb-8">
                            @foreach(__('landing.admin_features') as $feature)
                            <li class="flex items-start gap-3">
                                <div class="shrink-0 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                                </div>
                                <span>{{ $feature }}</span>
                            </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('register') }}?role=admin" class="block w-full bg-primary hover:bg-primary-600 text-white text-center py-3 px-4 rounded-3xl transition-colors">
                            {{ __('landing.register_as_admin') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Features Section -->
        <div class="py-16">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold">{{ __('landing.key_features') }}</h2>
                </div>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- QR Verification -->
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center">
                        <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="5" height="5" x="3" y="3" rx="1"/><rect width="5" height="5" x="16" y="3" rx="1"/><rect width="5" height="5" x="3" y="16" rx="1"/><path d="M21 16h-3a2 2 0 0 0-2 2v3"/><path d="M21 21v.01"/><path d="M12 7v3a2 2 0 0 1-2 2H7"/><path d="M3 12h.01"/><path d="M12 3h.01"/><path d="M12 16v.01"/><path d="M16 12h1"/><path d="M21 12v.01"/><path d="M12 21v-1"/></svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">{{ __('landing.features.qr_verification.title') }}</h3>
                        <p class="text-gray-600 text-sm">{{ __('landing.features.qr_verification.description') }}</p>
                    </div>
                    
                    <!-- Scoring Criteria -->
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center">
                        <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">{{ __('landing.features.scoring_criteria.title') }}</h3>
                        <p class="text-gray-600 text-sm">{{ __('landing.features.scoring_criteria.description') }}</p>
                    </div>
                    
                    <!-- Import Export -->
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center">
                        <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">{{ __('landing.features.import_export.title') }}</h3>
                        <p class="text-gray-600 text-sm">{{ __('landing.features.import_export.description') }}</p>
                    </div>
                    
                    <!-- Analytics -->
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center">
                        <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="m19 9-5 5-4-4-3 3"/></svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">{{ __('landing.features.analytics.title') }}</h3>
                        <p class="text-gray-600 text-sm">{{ __('landing.features.analytics.description') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>