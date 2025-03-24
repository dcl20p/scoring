<div x-data="{ 
    open: false,
    title: '',
    message: '',
    action: '',
    id: null,
    ids: []
}" 
    @open-modal-confirm.window="
        open = true;
        title = $event.detail.title;
        message = $event.detail.message;
        action = $event.detail.action;
        id = $event.detail.id;
        ids = $event.detail.ids;
    "
    x-show="open"
    class="fixed inset-0 z-[9999]"
    x-cloak
>
    <div class="absolute inset-0 bg-black/50 dark:bg-black/70" @click="open = false"></div>
    
    <div class="relative z-10 max-w-lg w-full mx-auto mt-16">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl">
            <div class="p-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4" x-text="title"></h3>
                {{ $content }}
            </div>
        </div>
    </div>
</div>