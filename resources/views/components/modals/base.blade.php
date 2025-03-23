<div x-data="{ 
    open: false, 
    title: '', 
    content: null
}" 
    @open-modal.window="
        open = true;
        title = $event.detail.title;
        content = $event.detail.content;
    "
    x-show="open"
    class="fixed inset-0 z-50 overflow-y-auto"
    style="display: none;">
    
    <div class="flex items-center justify-center min-h-screen p-4">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75" 
             x-show="open"
             @click="open = false">
        </div>

        <!-- Modal -->
        <div class="relative bg-white dark:bg-gray-800 rounded-lg w-full max-w-7xl mx-auto">
            <!-- Header -->
            <div class="px-4 py-3 border-b dark:border-gray-700">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white" x-text="title"></h3>
            </div>
            
            <!-- Content -->
            <div class="p-4 space-y-4 max-h-[70vh] overflow-y-auto">
                <template x-if="content">
                    <div>
                        <div class="mb-4">
                            <p class="font-semibold text-red-600 dark:text-red-400" 
                               x-text="content.message"></p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <span x-text="content.file"></span>:<span x-text="content.line"></span>
                            </p>
                        </div>
                        <pre class="bg-gray-100 dark:bg-gray-900 p-4 rounded-lg overflow-x-auto text-sm"
                             x-text="content.trace"></pre>
                    </div>
                </template>
            </div>
            
            <!-- Footer -->
            <div class="px-4 py-3 bg-gray-50 dark:bg-gray-700 flex justify-end rounded-b-lg">
                <button @click="open = false" 
                        class="px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>