<x-app-layout>
    <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
        <div class="col-span-2">
            <div class="card bg-white dark:bg-white/[0.03] dark:border-gray-800 dark:shadow-gray-700/3">
                <div class="card-body">
                    <div class="flex justify-between mb-5">
                        <h4 class="text-gray-500 text-lg font-semibold sm:mb-0 mb-2">Profit & Expenses</h4>
                        <div class="relative inline-flex">
                            <button class="rounded-full p-2 hover:bg-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="12" cy="5" r="1"></circle>
                                    <circle cx="12" cy="19" r="1"></circle>
                                </svg>
                            </button>
                            <div class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg border border-gray-100 z-50">
                                <div class="py-2">
                                    <a href="javascript:void(0)" class="flex items-center px-4 py-2.5 text-sm text-gray-400 hover:bg-gray-100">
                                        Action
                                    </a>
                                    <a href="javascript:void(0)" class="flex items-center px-4 py-2.5 text-sm text-gray-400 hover:bg-gray-100">
                                        Another Action
                                    </a>
                                    <a href="javascript:void(0)" class="flex items-center px-4 py-2.5 text-sm text-gray-400 hover:bg-gray-100">
                                        Something else here
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="profit"></div>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-gray-500 text-lg font-semibold mb-4">Traffic Distribution</h4>
                    <div class="flex items-center justify-between gap-12">
                        <div>
                            <h3 class="text-[22px] font-semibold text-gray-500 mb-4">$36,358</h3>
                            <div class="flex items-center gap-1 mb-3">
                                <span class="flex items-center justify-center w-5 h-5 rounded-full bg-teal-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-teal-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="17" y1="7" x2="7" y2="17"></line>
                                        <polyline points="7 7 17 7 17 17"></polyline>
                                    </svg>
                                </span>
                                <p class="text-gray-500 text-sm font-normal">+9%</p>
                                <p class="text-gray-400 text-sm font-normal text-nowrap">last year</p>
                            </div>
                            <div class="flex gap-4">
                                <div class="flex gap-2 items-center">
                                    <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                                    <p class="text-gray-400 font-normal text-xs">Organic</p>
                                </div>
                                <div class="flex gap-2 items-center">
                                    <span class="w-2 h-2 rounded-full bg-red-500"></span>
                                    <p class="text-gray-400 font-normal text-xs">Referral</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="flex gap-6 items-center justify-between">
                        <div class="flex flex-col gap-4">
                            <h4 class="text-gray-500 text-lg font-semibold">Product Sales</h4>
                            <div class="flex flex-col gap-4">
                                <h3 class="text-[22px] font-semibold text-gray-500">$6,820</h3>
                                <div class="flex items-center gap-1">
                                    <span class="flex items-center justify-center w-5 h-5 rounded-full bg-red-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-red-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="7" y1="7" x2="17" y2="17"></line>
                                            <polyline points="17 7 17 17 7 17"></polyline>
                                        </svg>
                                    </span>
                                    <p class="text-gray-500 text-sm font-normal">+9%</p>
                                    <p class="text-gray-400 text-sm font-normal text-nowrap">last year</p>
                                </div>
                            </div>
                        </div>

                        <div class="w-11 h-11 flex justify-center items-center rounded-full bg-red-500 text-white self-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div id="earning"></div>
            </div>
        </div>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
        <div class="card">
            <div class="card-body">
                <h4 class="text-gray-500 text-lg font-semibold mb-5">Upcoming Schedules</h4>
                <ul class="timeline-widget relative">
                    <li class="timeline-item flex relative overflow-hidden min-h-[70px]">
                        <div class="timeline-time text-gray-500 text-sm min-w-[90px] py-[6px] pr-4 text-end">
                            9:30 am
                        </div>
                        <div class="timeline-badge-wrap flex flex-col items-center">
                            <div class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-blue-600 my-[10px]">
                            </div>
                            <div class="timeline-badge-border block h-full w-[1px] bg-gray-100"></div>
                        </div>
                        <div class="timeline-desc py-[6px] px-4">
                            <p class="text-gray-500 text-sm font-normal">Payment received from John Doe of $385.90</p>
                        </div>
                    </li>
                    <li class="timeline-item flex relative overflow-hidden min-h-[70px]">
                        <div class="timeline-time text-gray-500 min-w-[90px] py-[6px] text-sm pr-4 text-end">
                            10:00 am
                        </div>
                        <div class="timeline-badge-wrap flex flex-col items-center">
                            <div class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-blue-300 my-[10px]">
                            </div>
                            <div class="timeline-badge-border block h-full w-[1px] bg-gray-100"></div>
                        </div>
                        <div class="timeline-desc py-[6px] px-4 text-sm">
                            <p class="text-gray-500 font-semibold">New sale recorded</p>
                            <a href="javascript:void(0)" class="text-blue-600">#ML-3467</a>
                        </div>
                    </li>

                    <li class="timeline-item flex relative overflow-hidden min-h-[70px]">
                        <div class="timeline-time text-gray-500 min-w-[90px] text-sm py-[6px] pr-4 text-end">
                            12:00 am
                        </div>
                        <div class="timeline-badge-wrap flex flex-col items-center">
                            <div class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-teal-500 my-[10px]">
                            </div>
                            <div class="timeline-badge-border block h-full w-[1px] bg-gray-100"></div>
                        </div>
                        <div class="timeline-desc py-[6px] px-4">
                            <p class="text-gray-500 text-sm font-normal">Payment was made of $64.95 to Michael</p>
                        </div>
                    </li>

                    <li class="timeline-item flex relative overflow-hidden min-h-[70px]">
                        <div class="timeline-time text-gray-500 min-w-[90px] text-sm py-[6px] pr-4 text-end">
                            9:30 am
                        </div>
                        <div class="timeline-badge-wrap flex flex-col items-center">
                            <div class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-yellow-500 my-[10px]">
                            </div>
                            <div class="timeline-badge-border block h-full w-[1px] bg-gray-100"></div>
                        </div>
                        <div class="timeline-desc py-[6px] px-4 text-sm">
                            <p class="text-gray-500 font-semibold">New sale recorded</p>
                            <a href="javascript:void(0)" class="text-blue-600">#ML-3467</a>
                        </div>
                    </li>

                    <li class="timeline-item flex relative overflow-hidden min-h-[70px]">
                        <div class="timeline-time text-gray-500 text-sm min-w-[90px] py-[6px] pr-4 text-end">
                            9:30 am
                        </div>
                        <div class="timeline-badge-wrap flex flex-col items-center">
                            <div class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-red-500 my-[10px]">
                            </div>
                            <div class="timeline-badge-border block h-full w-[1px] bg-gray-100"></div>
                        </div>
                        <div class="timeline-desc py-[6px] px-4">
                            <p class="text-gray-500 text-sm font-semibold">New arrival recorded</p>
                        </div>
                    </li>
                    <li class="timeline-item flex relative overflow-hidden">
                        <div class="timeline-time text-gray-500 text-sm min-w-[90px] py-[6px] pr-4 text-end">
                            12:00 am
                        </div>
                        <div class="timeline-badge-wrap flex flex-col items-center">
                            <div class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-teal-500 my-[10px]">
                            </div>
                            <div class="timeline-badge-border block h-full w-[1px] bg-gray-100"></div>
                        </div>
                        <div class="timeline-desc py-[6px] px-4">
                            <p class="text-gray-500 text-sm font-normal">Payment Done</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="col-span-2">
            <div class="card h-full">
                <div class="card-body">
                    <h4 class="text-gray-500 text-lg font-semibold mb-5">Top Paying Clients</h4>
                    <div class="relative overflow-x-auto">
                        <table class="text-left w-full whitespace-nowrap text-sm text-gray-500">
                            <thead>
                                <tr class="text-sm">
                                    <th scope="col" class="p-4 font-semibold">Profile</th>
                                    <th scope="col" class="p-4 font-semibold">Hour Rate</th>
                                    <th scope="col" class="p-4 font-semibold">Extra classes</th>
                                    <th scope="col" class="p-4 font-semibold">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    for ($i = 0; $i < 5; $i++):
                                    $keyStatus = array_rand($arrStatus = ['Available', 'In Class', 'Absent']);
                                    $itemStatus = $arrStatus[$keyStatus];

                                    $keyColor = array_rand($arrColor = ['teal', 'red', 'yellow', 'blue']);
                                    $itemColor = $arrColor[$keyColor];
                                @endphp
                                    
                                    <tr>
                                        <td class="p-4 text-sm">
                                            <div class="flex gap-6 items-center">
                                                <div class="h-12 w-12 inline-block">
                                                    <x-forms.img class="rounded-full"/>
                                                </div>
                                                <div class="flex flex-col gap-1 text-gray-500">
                                                    <h3 class="font-bold">Mark J. Freeman</h3>
                                                    <span class="font-normal">Prof. English</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4">
                                            <h3 class="font-medium">$150/hour</h3>
                                        </td>
                                        <td class="p-4">
                                            <h3 class="font-medium text-teal-500">+53</h3>
                                        </td>
                                        <td class="p-4">
                                            <span class="inline-flex items-center py-2 px-4 rounded-3xl font-semibold 
                                            bg-{{ $itemColor }}-100 text-{{ $itemColor }}-500">
                                                {{ $itemStatus }}
                                            </span>
                                        </td>
                                    </tr>
                                @php
                                    endfor;
                                @endphp
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="grid grid-cols-1 xl:grid-cols-4 lg:grid-cols-2 gap-6">
        @for ($i = 0; $i < 4; $i++)
            <div class="card overflow-hidden">
                <div class="relative">
                    <a href="javascript:void(0)">
                        <x-forms.img :width="600" :height="600"/>
                    </a>
                    <a href="javascript:void(0)" class="bg-blue-600 w-8 h-8 flex justify-center items-center text-white rounded-full absolute bottom-0 right-0 mr-4 -mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                    </a>
                </div>
                <div class="card-body">
                    <h6 class="text-base font-semibold text-gray-500 mb-1">Boat Headphone</h6>
                    <div class="flex justify-between">
                        <div class="flex gap-2 items-center">
                            <h6 class="text-gray-500 font-semibold text-base">$50</h6>
                            <span class="text-gray-400 font-medium text-sm opacity-80">
                                <del>$65</del>
                            </span>
                        </div>
                        <ul class="list-none flex gap-1">
                            <li>
                                <a href="javascript:void(0)">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-500" viewBox="0 0 24 24" fill="currentColor" stroke="none">
                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-500" viewBox="0 0 24 24" fill="currentColor" stroke="none">
                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-500" viewBox="0 0 24 24" fill="currentColor" stroke="none">
                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</x-app-layout>