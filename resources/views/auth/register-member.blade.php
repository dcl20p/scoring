<x-guest-layout>
    <div class="w-full max-w-md animate-fade-in">
        <x-tabs.title />
        
        <div class="bg-white rounded-xl shadow-md border border-gray-100 p-8">
            <div class="space-y-6 animate-slide-up">
                <x-tabs.header route="register"> 
                    <x-tabs.form type="teacher"/>
                    <x-tabs.form type="admin"/>
                </x-tabs.header>
                
                <x-tabs.footer route="register" />
            </div>
        </div>
    </div>
</x-guest-layout>