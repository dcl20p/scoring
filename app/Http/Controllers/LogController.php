<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index(Request $request)
    {
        $query = Log::query();

        // Filter by level
        if ($request->level) {
            $query->where('level', $request->level);
        }

        // Filter by user type
        if ($request->user_type) {
            $query->where('user_type', $request->user_type);
        }

        // Search in message
        if ($request->search) {
            $query->where('message', 'like', "%{$request->search}%");
        }

        // Date range filter
        if ($request->from_date) {
            $query->whereDate('created_at', '>=', $request->from_date);
        }
        if ($request->to_date) {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

        $logs = $query->with('user')
                     ->latest()
                     ->paginate(perPage: 10)
                     ->withQueryString();

        return view('admin.logs.index', compact('logs'));
    }

    public function destroy(Log $log)
    {
        try {
            $log->delete();
            return back()->with('success', __('logs.delete_success'));
        } catch (\Exception $e) {
            return back()->with('error', __('logs.delete_error'));
        }
    }

    public function bulkDestroy(Request $request)
    {
        try {
            $ids = json_decode($request->ids);
            $count = Log::whereIn('id', $ids)->delete();
            return back()->with('success', __('logs.delete_selected_success', ['count' => $count]));
        } catch (\Exception $e) {
            return back()->with('error', __('logs.delete_error')); 
        }
    }
}