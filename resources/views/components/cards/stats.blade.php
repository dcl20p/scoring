@props([
    'title',
    'value',
    'percentage',
    'trend' => 'up',
    'period' => 'last year',
    'icon' => null,
    'iconBgColor' => 'red-500',
    'indicators' => [],
    'chart' => false
])

<div {{ $attributes->merge(['class' => 'relative rounded-md shadow-md bg-white dark:bg-white/[0.03] dark:border dark:border-gray-800']) }}>
    <div class="p-6">
        <div class="flex gap-6 items-center justify-between">
            <div class="flex flex-col gap-4">
                <h4 class="text-gray-500 text-lg font-semibold">{{ $title ?? '' }}</h4>
                <div class="flex flex-col gap-4">
                    <h3 class="text-[22px] font-semibold text-gray-500">{{ $value ?? ''}}</h3>
                    <div class="flex items-center gap-1">
                        <span @class([
                            'flex items-center justify-center w-5 h-5 rounded-full',
                            'bg-teal-100' => $trend === 'up',
                            'bg-red-100' => $trend === 'down'
                        ])>
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                @class([
                                    'h-3 w-3',
                                    'text-teal-500' => $trend === 'up',
                                    'text-red-500' => $trend === 'down'
                                ]) 
                                viewBox="0 0 24 24" 
                                fill="none" 
                                stroke="currentColor" 
                                stroke-width="2" 
                                stroke-linecap="round" 
                                stroke-linejoin="round">
                                @if($trend === 'up')
                                    <line x1="17" y1="7" x2="7" y2="17"></line>
                                    <polyline points="7 7 17 7 17 17"></polyline>
                                @else
                                    <line x1="7" y1="7" x2="17" y2="17"></line>
                                    <polyline points="17 7 17 17 7 17"></polyline>
                                @endif
                            </svg>
                        </span>
                        <p class="text-gray-500 text-sm font-normal">{{ $percentage }}</p>
                        <p class="text-gray-400 text-sm font-normal text-nowrap">{{ $period }}</p>
                    </div>

                    @if(!empty($indicators))
                        <div class="flex gap-4">
                            @foreach($indicators as $indicator)
                                <div class="flex gap-2 items-center">
                                    <span class="w-2 h-2 rounded-full bg-{{ $indicator['color'] }}"></span>
                                    <p class="text-gray-400 font-normal text-xs">{{ $indicator['label'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            @if($icon)
                <div class="w-11 h-11 flex justify-center items-center rounded-full bg-{{ $iconBgColor }} text-white self-start">
                    {!! $icon !!}
                </div>
            @endif
        </div>
    </div>

    @if($chart)
        <div id="{{ $chart }}"></div>
    @endif
</div>