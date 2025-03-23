<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="mb-6 flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">System Logs</h1>
            <div class="flex items-center gap-2">
                <span class="text-xs text-gray-500 dark:text-gray-400">Total Logs: {{ $logs->total() }}</span>
            </div>
        </div>

        <!-- Filters -->
        <div class="mb-6">
            <x-forms.form :action="route('logs.index')" method="GET" classes="flex flex-wrap gap-4">
                <select name="level" class="rounded-md min-w-[150px]">
                    <option value="">All Levels</option>
                    <option value="EMERGENCY" @selected(request('level') == 'EMERGENCY')>Emergency</option>
                    <option value="ALERT" @selected(request('level') == 'ALERT')>Alert</option>
                    <option value="CRITICAL" @selected(request('level') == 'CRITICAL')>Critical</option>
                    <option value="ERROR" @selected(request('level') == 'ERROR')>Error</option>
                    <option value="WARNING" @selected(request('level') == 'WARNING')>Warning</option>
                    <option value="INFO" @selected(request('level') == 'INFO')>Info</option>
                </select>
                
                <div class="flex-1 min-w-[200px]">
                    <div class="relative">
                        <input type="text" name="search" 
                            placeholder="Search logs..." 
                            value="{{ request('search') }}" 
                            class="w-full rounded-md pl-10 pr-4 py-2">
                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2">
                            <i class="ti ti-search text-gray-400"></i>
                        </span>
                    </div>
                </div>
                    
                <x-buttons.gradient type="submit">
                    <i class="ti ti-filter mr-2"></i> Filter
                </x-buttons.gradient>
            </x-forms.form>
        </div>

        <!-- Logs Table -->
        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Time</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Level</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Message</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">User</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($logs as $log)
                
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ $log->created_at->format('Y-m-d H:i:s') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span @class([
                                    'px-2 inline-flex text-xs leading-5 font-semibold rounded-full',
                                    'bg-red-900 text-red-100' => $log->level === 'EMERGENCY',
                                    'bg-red-700 text-red-100' => $log->level === 'ALERT',
                                    'bg-red-500 text-red-100' => $log->level === 'CRITICAL',
                                    'bg-red-100 text-red-800' => $log->level === 'ERROR',
                                    'bg-yellow-100 text-yellow-800' => $log->level === 'WARNING', 
                                    'bg-blue-100 text-blue-800' => $log->level === 'INFO'
                                ])>
                                    {{ $log->level }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                <div class="flex items-start gap-2">
                                    <span>{{ Str::limit($log->message, 100) }}</span>
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
                                        <button type="button" 
                                            class="text-blue-600 hover:text-blue-700 dark:text-blue-400"
                                            x-data
                                            @click="$dispatch('open-modal', { 
                                                title: 'Error Details', 
                                                content: {{ $trace }}
                                            })">
                                            <i class="ti ti-info-circle"></i>
                                        </button>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                @if($log->user_id)
                                    {{ $log->user->full_name }}
                                    <span class="text-xs text-gray-400">({{ $log->user_type }})</span>
                                @else
                                    {{ $log->user_type }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $logs->links() }}
        </div>
    </div>

    <!-- Modal for log details -->
    <x-modals.base></x-modals.base>
</x-app-layout>