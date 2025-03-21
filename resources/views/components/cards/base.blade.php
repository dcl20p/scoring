@props([
    'title',
    'hasDropdown' => true
])

<div {{ $attributes->merge(['class' => 'relative rounded-md shadow-md bg-white dark:bg-white/[0.03] dark:border dark:border-gray-800']) }}>
    <div class="p-6">
        <div class="flex justify-between mb-5">
            <h4 class="text-gray-500 text-lg font-semibold sm:mb-0 mb-2">{{ $title }}</h4>
            
            @if($hasDropdown)
                <x-dropdowns.main>
                    @if(isset($trigger))
                        <x-slot:trigger>
                            {{ $trigger }}
                        </x-slot:trigger>
                    @endif

                    @if(isset($content))
                        <x-slot:content>
                            {{ $content }}
                        </x-slot:content>
                    @else
                        {{ $dropdown }}
                    @endif
                </x-dropdowns.main>
            @endif
        </div>
        {{ $slot }}
    </div>
</div>