<?php

return [
    'title' => 'System Logs',
    'breadcrumb' => [
        'dashboard' => 'Dashboard',
        'logs' => 'System Logs'
    ],
    'filters' => [
        'all_levels' => 'All Levels',
        'search_placeholder' => 'Search by message or user...',
        'filter_button' => 'Filter',
        'export_button' => 'Export',
        'search' => 'Search'
    ],
    'table' => [
        'time' => 'Time',
        'level' => 'Level',
        'url' => 'URL',
        'message' => 'Message',
        'user' => 'User',
        'actions' => 'Actions',
        'total_entries' => 'Total: :count entries'
    ],
    'delete' => [
        'title' => 'Delete Log',
        'selected_title' => 'Delete Selected Logs',
        'confirm' => 'Are you sure you want to delete this log?',
        'confirm_selected' => 'Are you sure you want to delete :count selected logs?',
        'success' => 'Log deleted successfully',
        'success_selected' => ':count logs deleted successfully',
        'error' => 'Failed to delete log(s)',
        'button' => 'Delete',
        'cancel' => 'Cancel'
    ],
    'modals' => [
        'error_detail' => 'Error Details',
        'close' => 'Close',
    ],
    'no_data' => 'No logs found',
];
