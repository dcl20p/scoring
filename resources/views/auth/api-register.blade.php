@php
    use App\Models\School;
@endphp

<x-guest-layout>
    <div class="max-w-5xl w-full animate-fade-in">
        <x-tabs.title />
        
        <div class="bg-white rounded-xl shadow-md border border-gray-100 p-8">
            <div class="space-y-6 animate-slide-up">
                <div class="text-center">
                    <h2 class="text-3xl font-extrabold text-gray-900">
                        {{ __('auth.register_school_title') }}
                    </h2>
                    <p class="mt-2 text-sm text-gray-600">
                        {{ __('auth.create_super_admin_prompt') }}
                    </p>
                </div>
                
                <x-forms.form id="form-register-admin">
                    <input type="hidden" name="role" value="SUPER_ADMIN">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Left Column: Administrator Information Section -->
                        <div>
                            <div class="flex items-center">
                                <div class="bg-blue-100 rounded-full p-2 mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-medium text-gray-900">{{ __('auth.admin_information') }}</h3>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <x-forms.field 
                                    id="first_name" 
                                    name="first_name" 
                                    label="{{ __('auth.first_name') }}" 
                                    type="text" 
                                    placeholder="John" 
                                    required 
                                    autocomplete="given-name" 
                                    :api="true"
                                />

                                <x-forms.field 
                                    id="last_name" 
                                    name="last_name" 
                                    label="{{ __('auth.last_name') }}" 
                                    type="text" 
                                    placeholder="Doe" 
                                    required 
                                    autocomplete="given-name" 
                                    :api="true"
                                />
                            </div>
                            
                            <x-forms.field 
                                id="email" 
                                name="email" 
                                label="Email" 
                                type="email" 
                                placeholder="your@example.com" 
                                required 
                                autocomplete="email" 
                                :api="true"
                            />
                            
                            <x-forms.phone-group name="phone" id="phone" label="{{ __('auth.phone') }}"/>
                            
                            <x-forms.field 
                                id="password" 
                                name="password" 
                                label="{{ __('auth.password') }}" 
                                type="password" 
                                placeholder="••••••••" 
                                class="my-2"
                                classLabel="mt-2"
                                required 
                                autocomplete="new_password"
                                :passwordStrength="true"
                                :api="true"
                            />

                            <x-forms.field 
                                id="password_confirmation" 
                                name="password_confirmation" 
                                label="{{ __('auth.confirm_password') }}" 
                                type="password" 
                                class="my-2"
                                placeholder="••••••••" 
                                required 
                                autocomplete="new_password"
                                :api="true"
                            />
                        </div>
                        <!-- Right Column: School Information Section -->
                        <div>
                            <div class="flex items-center">
                                <div class="bg-blue-100 rounded-full p-2 mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-medium text-gray-900">{{ __('auth.school_information') }}</h3>
                            </div>
                            
                            <x-forms.field 
                                id="school" 
                                name="school" 
                                label="{{ __('auth.school_name') }}" 
                                type="text" 
                                placeholder="{{ __('auth.enter_school') }}" 
                                required 
                                :api="true"
                            />

                            <div class="grid grid-cols-2 gap-4">
                                <x-forms.field 
                                    id="province" 
                                    name="province" 
                                    label="{{ __('auth.province') }}" 
                                    type="text" 
                                    placeholder="Tp.HCM" 
                                    :api="true"
                                />

                                <x-forms.field 
                                    id="district" 
                                    name="district" 
                                    label="{{ __('auth.district') }}" 
                                    type="text" 
                                    placeholder="Gò Vấp" 
                                    :api="true"
                                />
                            </div>

                            <x-forms.field
                                name="school_type" 
                                id="school_type"
                                label="{{ __('auth.school_type') }}"
                                type="select"
                                class=""
                                :options="[
                                    School::TYPE_UNIVERSITY => __('auth.school_type_university'),
                                    School::TYPE_SCHOOL => __('auth.school_type_normal'),
                                    School::TYPE_COLLEGE => __('auth.school_type_college'),
                                    School::TYPE_VOCATIONAL => __('auth.school_type_vocational'),
                                    School::TYPE_OTHER => __('auth.school_type_other'),
                                ]"
                                placeholder="{{ __('auth.select_school_type') }}"
                                required
                                :api="true"
                            />

                            <x-forms.field 
                                id="school_email" 
                                name="school_email" 
                                label="{{ __('auth.school_email') }}" 
                                type="email" 
                                placeholder="info@school.edu" 
                                class="my-2"
                                classLabel="mt-2"
                                required 
                                :api="true"
                                autocomplete="email" >
                                <p class="mt-2 mb-8 text-xs text-gray-500">{{ __('auth.school_email_help') }}</p>
                            </x-forms.field>

                            <x-forms.field 
                                id="website" 
                                name="website" 
                                label="{{ __('auth.website') }}" 
                                type="text" 
                                class="pl-10 my-2"
                                :api="true"
                                placeholder="https://school.edu" 
                            >
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                    </svg>
                                </div>
                            </x-forms.field>

                        </div>
                    </div>
                    
                    <x-agree-terms />

                    <x-forms.button class="lg:w-5/12" id="btn-register" :api="true">
                        <x-icons.loading-button id="icon-loading-register" class="hidden"/>
                        <span id="btn-text">{{ __("auth.register_school_button") }}</span>
                    </x-forms.button>
                    
                    <div class="text-center mt-4">
                        <p class="text-sm text-gray-600">
                            {{ __('auth.already_have_account') }} 
                            <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">
                                {{ __('auth.sign_in') }}
                            </a>
                        </p>
                    </div>
                </x-forms.form>
            </div>
        </div>
    </div>
</x-guest-layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const registerButton = document.getElementById('btn-register');
        const adminFormRegister = document.getElementById('form-register-admin');

        registerButton.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelectorAll('.error-message').forEach(el => el.textContent = '');
            let self = this;
            let iconLoading = document.getElementById('icon-loading-register');
            let textBtn = document.getElementById('btn-text');
            iconLoading.classList.remove('hidden');
            self.disabled = true;
            textBtn.textContent  = "{{ __('auth.loading_register') }}";

            const formData = new FormData(adminFormRegister);
            fetch("{{ route('api.register.store') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                self.disabled = false;
                textBtn.textContent  = "{{ __('auth.register_school_button') }}";
                iconLoading.classList.add('hidden');
                
                if (data.status === 'success') {
                    showFlashMessage(data.status, data.message);
                    window.location.href = data.data.verify_url;
                } else {
                    // Show error messages
                    if (data.message) {
                        showFlashMessage(data.status, data.message);
                    }
                    
                    // Show validation errors
                    if (data.errors) {
                        Object.keys(data.errors).forEach(field => {
                            const errorElement = document.getElementById(`${field}-error`);
                            if (errorElement) {
                                errorElement.textContent = data.errors[field][0];
                            }
                        });
                    }
                }
            })
            .catch(error => {
                self.disabled = false;
                textBtn.textContent = "{{ __('auth.register_school_button') }}";
                console.error('Registration error:', error);
            });
        });
    });
</script>