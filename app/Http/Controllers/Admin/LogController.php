<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FirewallLog;

class LogController extends Controller
{
    public function index() {
        $logs = FirewallLog::with('rule')->latest()->paginate(30);
        $blockedToday = FirewallLog::whereDate('created_at', today())->where('action', 'blocked')->count();
        $allowedToday = FirewallLog::whereDate('created_at', today())->where('action', 'allowed')->count();
        return view('admin.logs', compact('logs', 'blockedToday', 'allowedToday'));
    }
}
