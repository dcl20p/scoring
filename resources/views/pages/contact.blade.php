<x-guest-layout>
    <div class="w-full max-w-4xl mx-auto p-6" id="contact">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
            @if (session('success'))
                <div class="bg-green-50 text-green-800 rounded-lg p-4 mb-6 border border-green-100">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif
            
            @include('pages.breadcumbs')
            
            <h1 class="text-3xl font-semibold mb-6">{{ __('contact.title') }}</h1>
            
            <div class="grid md:grid-cols-2 gap-8">
                <div>
                    <div class="prose max-w-none">
                        <p class="text-gray-700 mb-6">{{ __('contact.subtitle') }}</p>
                        
                        <div class="space-y-4 mb-6">
                            <div class="flex items-start gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary mt-0.5"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                <div>
                                    <h3 class="font-semibold text-gray-900">{{ __('contact.contact_info.phone_title') }}</h3>
                                    <p class="text-gray-700">+1 (555) 123-4567</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary mt-0.5"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg>
                                <div>
                                    <h3 class="font-semibold text-gray-900">{{ __('contact.contact_info.email_title') }}</h3>
                                    <p class="text-gray-700">support@assesscrafter.com</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary mt-0.5"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                <div>
                                    <h3 class="font-semibold text-gray-900">{{ __('contact.contact_info.address_title') }}</h3>
                                    <p class="text-gray-700">123 Education Avenue<br>Learning District, ED 12345</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        <h3 class="text-xl font-semibold mb-4">{{ __('contact.office_hours.title') }}</h3>
                        <ul class="space-y-1 text-gray-700">
                            <li>{{ __('contact.office_hours.weekdays') }}: 9:00 AM - 5:00 PM</li>
                            <li>{{ __('contact.office_hours.saturday') }}: 10:00 AM - 2:00 PM</li>
                            <li>{{ __('contact.office_hours.sunday') }}: {{ __('contact.office_hours.closed') }}</li>
                        </ul>
                    </div>
                </div>
                
                <div>
                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
                        @csrf
                        
                        <div class="space-y-2">
                            <label for="name" class="block text-sm font-medium text-gray-700">
                                {{ __('contact.form.name') }}
                                <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="{{ __('contact.form.your_name') }}"
                                required
                                class="h-12 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary @error('name') border-red-500 @enderror"
                            >
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-medium text-gray-700">
                                {{ __('contact.form.email') }}
                                <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="{{ __('contact.form.your_email') }}"
                                required
                                class="h-12 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary @error('email') border-red-500 @enderror"
                            >
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="space-y-2">
                            <label for="subject" class="block text-sm font-medium text-gray-700">
                                {{ __('contact.form.subject') }}
                                <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text"
                                id="subject"
                                name="subject"
                                value="{{ old('subject') }}"
                                placeholder="{{ __('contact.form.your_subject') }}"
                                required
                                class="h-12 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary @error('subject') border-red-500 @enderror"
                            >
                            @error('subject')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="space-y-2">
                            <label for="phone" class="block text-sm font-medium text-gray-700">
                                {{ __('contact.form.phone') }}
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <input 
                                    type="tel"
                                    id="phone"
                                    name="phone"
                                    value="{{ old('phone') }}"
                                    placeholder="+84 123 456 789"
                                    class="h-12 w-full pl-10 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary @error('phone') border-red-500 @enderror"
                                >
                            </div>
                            @error('phone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="space-y-2">
                            <label for="message" class="block text-sm font-medium text-gray-700">
                                {{ __('contact.form.message') }}
                                <span class="text-red-500">*</span>
                            </label>
                            <textarea 
                                id="message" 
                                name="message" 
                                rows="5" 
                                placeholder="{{ __('contact.form.your_message') }}"
                                required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary/50 focus:border-primary @error('message') border-red-500 @enderror"
                            >{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <button type="submit" class="w-full h-12 mt-6 bg-primary text-white rounded-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-colors">
                            {{ __('contact.form.send_button') }}
                        </button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</x-guest-layout>