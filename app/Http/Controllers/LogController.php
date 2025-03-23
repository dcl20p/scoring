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
                     ->paginate(20)
                     ->withQueryString();

        return view('admin.logs.index', compact('logs'));
    }
}