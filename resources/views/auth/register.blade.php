<x-guest-layout>
    <div class="w-full max-w-md animate-fade-in">
        <x-auths.title />
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
            <div class="space-y-6 animate-slide-up">
                <x-auths.tabs-header route="register"> 
                    <x-auths.tabs-form type="teacher" route="register"/>
                    <x-auths.tabs-form type="admin" route="register"/>
                </x-auths.tabs-header>
                
                <x-auths.tabs-footer route="register" />
            </div>
        </div>
    </div>
</x-guest-layout>