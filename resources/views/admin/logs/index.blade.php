<x-app-layout>
    <div class="container mx-auto px-4 py-4">
        <!-- Header with Title and Breadcrumb -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">System Logs</h1>
            
            <nav aria-label="Breadcrumb">
                <ol class="inline-flex items-center">
                    <li class="text-gray-500 dark:text-gray-400">Dashboard</li>
                    <li class="flex items-center">
                        <svg class="stroke-current mx-2" width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.0765 12.667L10.2432 8.50033L6.0765 4.33366" stroke="" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <span class="text-gray-800 font-semibold dark:text-gray-400">System Logs</span>
                    </li>
                </ol>
            </nav>
        </div>

        <!-- Filters Card -->
        <div class="bg-white border-gray-200 dark:bg-gray-800 dark:border dark:border-gray-700 shadow-md dark:shadow-gray-700/300 rounded-md p-6 mb-6">
            <x-forms.form :action="route('logs.index')" method="GET">
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-4 items-end">
                    <div class="relative">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Level</label>
                        <select name="level" class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
                            <option value="">All Levels</option>
                            @foreach(['EMERGENCY', 'ALERT', 'CRITICAL', 'ERROR', 'WARNING', 'INFO'] as $level)
                                <option value="{{ $level }}" @selected(request('level') == $level)>{{ $level }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="relative lg:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Search</label>
                        <div class="relative">
                            <input type="text" name="search" 
                                placeholder="Search by message or user..." 
                                value="{{ request('search') }}" 
                                class="w-full rounded-lg pl-10 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
                            <span class="absolute left-3 top-1/2 transform -translate-y-1/2">
                                <i class="ti ti-search text-gray-400"></i>
                            </span>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <x-buttons.gradient type="submit" class="flex-1">
                            <i class="ti ti-filter mr-2"></i>
                            Filters
                        </x-buttons.gradient>
                        
                        <x-buttons.gradient theme="cyan_blue" class="flex-1">
                            <i class="ti ti-download mr-2"></i>
                            Export
                        </x-buttons.gradient>
                    </div>
                </div>
            </x-forms.form>
        </div>

        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-4">
                {{-- <span class="px-3 py-1 text-xs font-medium rounded-full bg-primary/10 text-primary dark:bg-primary/20 dark:text-primary-400">
                    Total: {{ $logs->total() }} entries
                </span>
                 --}}
                <x-buttons.gradient 
                    {{-- x-show="selected.length > 0" --}}
                    x-cloak
                    @click="$dispatch('open-modal-confirm', {
                        title: 'Delete Selected Logs',
                        message: `Are you sure you want to delete ${selected.length} selected logs?`,
                        action: 'delete-selected',
                        ids: selected
                    })"
                    class="flex items-center gap-2 bg-red-500 hover:bg-red-600"
                >
                    <i class="ti ti-trash"></i>
                    <span x-text="`Delete (${selected.length})`"></span>
                </x-buttons.gradient>
            </div>
        </div>

        <!-- Logs Table Card -->
        <div class="bg-white border-t border-gray-200 dark:bg-gray-800 dark:border dark:border-gray-700 shadow-md dark:shadow-gray-700/300 rounded-md overflow-hidden"
            x-data="{ 
                logs: {{ json_encode($logs->pluck('id')) }},
                selected: [],
                selectAll: false,
                toggleAll() {
                    if (!this.selectAll) {
                        this.selected = [];
                    } else {
                        this.selected = [...this.logs];
                    }
                }
            }"
            x-init="$watch('selected', value => {
                selectAll = value.length > 0 && value.length === logs.length;
            })">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-200 dark:bg-gray-700 font-bold">
                        <tr>
                            <th class="px-6 py-4 w-4">
                                <input type="checkbox" 
                                    x-model="selectAll"
                                    @click="toggleAll()"
                                    class="w-4 h-4 rounded-full cursor-pointer text-primary bg-white border-gray-300 focus:ring-primary/20 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary/20 dark:focus:ring-offset-gray-800">
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Time
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Level
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                URL
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Message
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                User
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($logs as $log)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                                <td class="px-6 py-4">
                                    <input type="checkbox" 
                                        class="w-4 h-4 rounded-full text-primary bg-white border-gray-300 focus:ring-primary/20 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary/20 dark:focus:ring-offset-gray-800"
                                        value="{{ $log->id }}"
                                        x-model="selected">
                                </td>
                                <!-- Time cell -->
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <div class="flex flex-col">
                                        <span class="text-gray-900 dark:text-gray-100 font-medium">
                                            {{ $log->created_at->format('H:i:s') }}
                                        </span>
                                        <span class="text-gray-500 dark:text-gray-400 text-xs">
                                            {{ $log->created_at->format('Y-m-d') }}
                                        </span>
                                    </div>
                                </td>

                                <!-- Level cell with improved badges -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span @class([
                                        'px-3 py-1 text-xs font-medium rounded-full',
                                        'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' => in_array($log->level, ['EMERGENCY', 'ALERT', 'CRITICAL']),
                                        'bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200' => $log->level === 'ERROR',
                                        'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' => $log->level === 'WARNING',
                                        'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' => $log->level === 'INFO'
                                    ])>
                                        {{ $log->level }}
                                    </span>
                                </td>

                                <!-- URL cell -->
                                <td class="px-6 py-4">
                                    <span class="text-sm text-gray-900 dark:text-gray-100">
                                        {{ Str::limit($log->url ?? '-', 50) }}
                                    </span>
                                </td>

                                <!-- Message cell with improved layout -->
                                <td class="px-6 py-4">
                                    <div class="flex items-start gap-3">
                                        <p class="text-sm text-gray-900 dark:text-gray-100">
                                            {{ Str::limit($log->message, 80) }}
                                        </p>
                                        @if($log->context)
                                            @php
                                                $trace = '';
                                                if (isset($log->context['exception'])) {
                                                    $exception = $log->context['exception'];
                                                    $trace = json_encode([
                                                        'class' => $exception['class'] ?? 'Unknown',
                                                        'message' => $exception['message'] ?? '',
                                                        'file' => $exception['file'] ?? '',
                                                        'line' => $exception['line'] ?? '',
                                                        'trace' => $exception['trace'] ?? ''
                                                    ]);
                                                }
                                            @endphp
                                            @if(!empty($exception['trace']))
                                                <button type="button" 
                                                    class="inline-flex items-center justify-center size-6 rounded-full bg-blue-50 text-blue-600 hover:bg-blue-100 dark:bg-blue-900/50 dark:text-blue-400 dark:hover:bg-blue-900"
                                                    x-data
                                                    @click="$dispatch('open-modal', { 
                                                        title: 'Error Details', 
                                                        content: {{ $trace }}
                                                    })">
                                                    <i class="ti ti-info-circle"></i>
                                                </button>
                                            @endif
                                        @endif
                                    </div>
                                </td>

                                <!-- User cell with improved layout -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($log->user_id)
                                        <div class="flex items-center gap-3">
                                            <div class="size-8 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                                                <i class="ti ti-user text-gray-500 dark:text-gray-400"></i>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                                    {{ $log->user->full_name }}
                                                </div>
                                                <div class="text-xs text-gray-500 dark:text-gray-400">
                                                    {{ $log->user_type }}
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <span class="text-sm text-gray-500 dark:text-gray-400">
                                            {{ $log->user_type }}
                                        </span>
                                    @endif
                                </td>

                                <!-- Actions cell -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button type="button"
                                        class="inline-flex items-center justify-center size-8 rounded-full text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/50"
                                        @click="$dispatch('open-modal-confirm', {
                                            title: 'Delete Log',
                                            message: 'Are you sure you want to delete this log?',
                                            action: 'delete-log',
                                            id: {{ $log->id }}
                                        })"
                                    >
                                        <i class="ti ti-trash text-lg"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination with improved styling -->
        <div class="mt-6">
            {{ $logs->links() }}
        </div>
    </div>
    <!-- Delete Confirmation Modal -->
    <x-modals.confirmation>
        <x-slot:content>
            <p x-text="message" class="mb-4 text-gray-600 dark:text-gray-400"></p>
            <div class="flex justify-end gap-3">
                <x-buttons.gradient theme="cyan_blue" @click="open = false">
                    Cancel
                </x-buttons.gradient>
                <form x-bind:action="action === 'delete-selected' 
                    ? '{{ route('logs.bulk-delete') }}'
                    : '{{ route('logs.destroy', '') }}/' + id" 
                    method="POST"
                >
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="ids" x-bind:value="JSON.stringify(ids)" x-if="action === 'delete-selected'">
                    <x-buttons.gradient type="submit" class="bg-red-500 hover:bg-red-600">
                        Delete
                    </x-buttons.gradient>
                </form>
            </div>
        </x-slot>
    </x-modals.confirmation>
</x-app-layout>