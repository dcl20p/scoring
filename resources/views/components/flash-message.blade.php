<!-- Flash Message Container -->
<div x-data="{ show: false, type: '', message: '', title: 'Error', icon_svg: ''}" x-show="show" 
    x-transition x-init="setTimeout(() => show = false, 3000)"
    class="fixed top-4 right-4 z-50 flex items-center p-4 mb-4 rounded-lg"
    :class="{
        'bg-green-50 text-green-800 dark:bg-gray-800 dark:text-green-400': type === 'success',
        'bg-red-50 text-red-800 dark:bg-gray-800 dark:text-red-400': type === 'error'
    }"
    style="display: none"
    id="flash-message">
    <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
        viewBox="0 0 20 20"
        :class="{
            'text-green-500': type === 'success',
            'text-red-500': type === 'error'
        }">
        <path fill-rule="evenodd" x-bind:d="icon_svg" lip-rule="evenodd" />
    </svg>
    <span class="sr-only" x-text="title"></span>
    <div class="ms-3 text-sm font-medium" x-text="message"></div>
    <button type="button" @click="show = false"
        class="ms-auto -mx-1.5 -my-1.5 p-1.5 inline-flex items-center justify-center h-8 w-8"
        aria-label="Close">
        <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
    </button>
</div>
