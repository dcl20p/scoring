@props(['align' => 'right', 'width' => '150px'])

<div {{ $attributes->merge([
    'class' => 'hidden relative bg-white dark:bg-gray-800 border dark:border dark:border-gray-800 shadow-md dark:shadow-gray-700/300 hs-dropdown-menu min-w-max w-[150px] z-[12] rounded-md duration hs-dropdown-open:opacity-100 opacity-0 mt-2 transition-[opacity,margin]'
    ]) }}
    style="width: {{ $width }};"
>
    <div class="py-2 p-0">
        {{ $slot }}
    </div>
</div>