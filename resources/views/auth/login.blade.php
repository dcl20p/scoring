<x-guest-layout>
    <div class="w-full max-w-md animate-fade-in">
        <x-auths.title />

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
            <div class="space-y-6 animate-slide-up">
                
                <x-auths.tabs-header>
                    <x-auths.tabs-form type="teacher"/>
                    <x-auths.tabs-form type="admin"/>
                </x-auths.tabs-header>

                <x-auths.tabs-footer />
            </div>
        </div>
    </div>
</x-guest-layout>