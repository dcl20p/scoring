<div x-data="{ 
    open: false, 
    title: '', 
    content: ''
}" 
    @open-modal.window="
        open = true;
        title = $event.detail.title;
        content = $event.detail.content;
    "
    x-show="open"
    class="fixed inset-0 modal-wrapper"
    style="display: none;">
    
    <div class="flex items-center justify-center min-h-screen p-4">
        <!-- Backdrop -->
        <div class="fixed inset-0 transition-opacity" 
             x-show="open"
             x-transition:enter="ease-out duration-150"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-100"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="open = false">
            <div class="absolute inset-0 bg-gray-500 dark:bg-gray-900 opacity-75"></div>
        </div>

        <!-- Modal -->
        <div class="relative bg-white border dark:border-gray-600 dark:bg-gray-800 rounded-lg w-full max-w-7xl mx-auto shadow-[0_0_50px_rgba(0,0,0,0.25)] dark:shadow-[0_0_50px_rgba(0,0,0,0.5)]">
            <!-- Header -->
            <div class="px-4 py-3 border-b dark:border-gray-700 flex items-center justify-between">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white" x-text="title"></h3>
                <button @click="open = false" 
                        class="inline-flex items-center justify-center size-8 rounded-lg text-gray-500 hover:text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-gray-200 dark:hover:bg-gray-700/50 transition-colors">
                    <i class="ti ti-x text-lg"></i>
                </button>
            </div>
            
            <!-- Content -->
            <div class="max-h-[65vh] simplebar-horizontal-visible" data-simplebar>
                <div class="p-4 space-y-4 min-w-full">
                    <template x-if="content">
                        <div>
                            <div class="mb-4">
                                <p class="font-semibold text-red-600 dark:text-red-400" 
                                   x-text="content.message"></p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    <span x-text="content.file"></span>:<span x-text="content.line"></span>
                                </p>
                            </div>
                            <div class="bg-gray-100 dark:bg-gray-900 p-4 rounded-lg overflow-auto">
                                <pre class="whitespace-pre-wrap break-all" x-text="content.trace"></pre>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="px-4 py-3 flex justify-end rounded-b-lg border-t dark:border-gray-700">
                <button @click="open = false" 
                        class="px-4 py-2 bg-gray-700 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 border dark:border-gray-600 text-white rounded-md hover:bg-gray-700">
                    {{ __('log.modals.close') }}
                </button>
            </div>
        </div>
    </div>
</div>