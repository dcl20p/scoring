<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index(Request $request)
    {
        $logs = Log::query()
            ->filter($request->all())
            ->with('user')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.logs.index', compact('logs'));
    }

    public function destroy(Log $log)
    {
        try {
            $log->delete();
            return back()->with('success', __('log.delete.success'));
        } catch (\Exception $e) {
            return back()->with('error', __('log.delete.error'));
        }
    }

    public function bulkDestroy(Request $request)
    {
        try {
            $ids = json_decode($request->ids);
            $count = Log::whereIn('id', $ids)->delete();
            return back()->with('success', __('log.delete.success_selected', ['count' => $count]));
        } catch (\Exception $e) {
            return back()->with('error', __('log.delete.error')); 
        }
    }
}