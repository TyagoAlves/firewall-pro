<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FirewallLog;
use App\Models\FirewallRule;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function rules(): JsonResponse
    {
        return response()->json(FirewallRule::latest()->paginate(15));
    }

    public function storeRule(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'domain' => 'required|string|max:255',
            'chain' => 'required|in:FORWARD,OUTPUT,INPUT',
            'action' => 'required|in:DROP,REJECT,ACCEPT',
            'description' => 'nullable|string',
        ]);
        $rule = FirewallRule::create($validated + ['enabled' => true]);
        return response()->json($rule, 201);
    }

    public function showRule(FirewallRule $rule): JsonResponse
    {
        return response()->json($rule->load('logs'));
    }

    public function updateRule(Request $request, FirewallRule $rule): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'domain' => 'sometimes|string|max:255',
            'chain' => 'sometimes|in:FORWARD,OUTPUT,INPUT',
            'action' => 'sometimes|in:DROP,REJECT,ACCEPT',
            'enabled' => 'sometimes|boolean',
            'description' => 'nullable|string',
        ]);
        $rule->update($validated);
        return response()->json($rule);
    }

    public function deleteRule(FirewallRule $rule): JsonResponse
    {
        $rule->delete();
        return response()->json(['message' => 'Regra removida.']);
    }

    public function logs(): JsonResponse
    {
        return response()->json(FirewallLog::with('rule')->latest()->paginate(15));
    }

    public function stats(): JsonResponse
    {
        return response()->json([
            'total_rules' => FirewallRule::count(),
            'enabled_rules' => FirewallRule::where('enabled', true)->count(),
            'total_logs' => FirewallLog::count(),
            'blocked_today' => FirewallLog::whereDate('created_at', today())->where('action', 'blocked')->count(),
            'allowed_today' => FirewallLog::whereDate('created_at', today())->where('action', 'allowed')->count(),
        ]);
    }

    public function iptables(): JsonResponse
    {
        $rules = FirewallRule::where('enabled', true)->get();
        $commands = $rules->map(fn($r) => "iptables -A {$r->chain} -m string --string \"{$r->domain}\" --algo bm -j {$r->action}")->toArray();
        return response()->json(['commands' => $commands]);
    }
}
