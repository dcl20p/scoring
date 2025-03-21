@props(['title', 'price', 'originalPrice', 'rating' => 5])

<div class="relative rounded-md shadow-md bg-white dark:bg-white/[0.03] dark:border dark:border-gray-800 overflow-hidden">
    <div class="relative">
        <a href="javascript:void(0)">
            <x-forms.img :width="600" :height="600" />
        </a>
        <a href="javascript:void(0)" class="bg-blue-600 w-8 h-8 flex justify-center items-center text-white rounded-full absolute bottom-0 right-0 mr-4 -mb-3">
            <x-icons.shopping-cart />
        </a>
    </div>
    <div class="p-6">
        <h6 class="text-base font-semibold text-gray-500 mb-1">{{ $title }}</h6>
        <div class="flex justify-between">
            <div class="flex gap-2 items-center">
                <h6 class="text-gray-500 font-semibold text-base">${{ $price }}</h6>
                <span class="text-gray-400 font-medium text-sm opacity-80">
                    <del>${{ $originalPrice }}</del>
                </span>
            </div>
            <x-icons.rating :rating="4.7" /> 
        </div>
    </div>
</div>