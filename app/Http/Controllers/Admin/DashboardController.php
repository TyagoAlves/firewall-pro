<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FirewallRule;
use App\Models\FirewallLog;
use App\Models\Setting;

class DashboardController extends Controller
{
    public function index() {
        $totalRules = FirewallRule::count();
        $activeRules = FirewallRule::where('enabled', true)->count();
        $totalLogs = FirewallLog::count();
        $recentLogs = FirewallLog::latest()->take(10)->get();
        $recentRules = FirewallRule::latest()->take(5)->get();
        return view('admin.dashboard', compact('totalRules', 'activeRules', 'totalLogs', 'recentLogs', 'recentRules'));
    }
}
