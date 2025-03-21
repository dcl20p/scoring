<x-app-layout>
    <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-x-6 gap-x-0 lg:gap-y-6 gap-y-0">
        <div class="col-span-2">
            <x-cards.base title="Profit & Expenses">
                <x-slot:dropdown>
                    <x-slot:content>
                        <x-dropdowns.item>Action</x-dropdowns.item>
                        <x-dropdowns.item>Another Action</x-dropdowns.item>
                        <x-dropdowns.item>Something else</x-dropdowns.item>
                    </x-slot:content>
                </x-slot:dropdown>

                <div id="profit"></div>
            </x-cards.base>
        </div>
        <div class="flex flex-col gap-6">

            <x-cards.stats title="Traffic Distribution" value="$36,358" percentage="+9%" trend="up" :indicators="[
        ['color' => 'blue-600', 'label' => 'Organic'],
        ['color' => 'red-500', 'label' => 'Referral']
    ]" />

            <x-cards.stats title="Product Sales" value="$6,820" percentage="+9%" trend="down" iconBgColor="red-500"
                chart="earning">
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="1" x2="12" y2="23"></line>
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                    </svg>
                </x-slot>
            </x-cards.stats>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
        <div class="relative rounded-md shadow-md bg-white dark:bg-white/[0.03] dark:border dark:border-gray-800">
            <div class="p-6">
                <h4 class="text-gray-500 text-lg font-semibold mb-5">Upcoming Schedules</h4>
                <ul class="timeline-widget relative">
                    <li class="timeline-item flex relative overflow-hidden min-h-[70px]">
                        <div class="timeline-time text-gray-500 text-sm min-w-[90px] py-[6px] pr-4 text-end">
                            9:30 am
                        </div>
                        <div class="timeline-badge-wrap flex flex-col items-center">
                            <div
                                class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-blue-600 my-[10px]">
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
                            <div
                                class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-blue-300 my-[10px]">
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
                            <div
                                class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-teal-500 my-[10px]">
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
                            <div
                                class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-yellow-500 my-[10px]">
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
                            <div
                                class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-red-500 my-[10px]">
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
                            <div
                                class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-teal-500 my-[10px]">
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
            <div class="relative rounded-md shadow-md bg-white dark:bg-white/[0.03] dark:border dark:border-gray-800">
                <div class="p-6">
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
                                                <x-forms.img class="rounded-full" />
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
            <x-cards.product 
                title="Boat Headphone"
                price="50"
                originalPrice="65"
                rating="4"
            />
        @endfor
    </div>
</x-app-layout>