<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FirewallRule;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    public function index() {
        $rules = FirewallRule::latest()->paginate(15);
        return view('admin.rules.index', compact('rules'));
    }
    public function create() { return view('admin.rules.create'); }
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'domain' => 'required|string|max:255',
            'chain' => 'required|in:FORWARD,OUTPUT,INPUT',
            'action' => 'required|in:DROP,REJECT,ACCEPT',
            'description' => 'nullable|string',
        ]);
        FirewallRule::create($validated + ['enabled' => true]);
        return redirect()->route('admin.rules.index')->with('success', 'Regra criada com sucesso.');
    }
    public function edit(FirewallRule $rule) { return view('admin.rules.edit', compact('rule')); }
    public function update(Request $request, FirewallRule $rule) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'domain' => 'required|string|max:255',
            'chain' => 'required|in:FORWARD,OUTPUT,INPUT',
            'action' => 'required|in:DROP,REJECT,ACCEPT',
            'description' => 'nullable|string',
            'enabled' => 'boolean',
        ]);
        $rule->update($validated);
        return redirect()->route('admin.rules.index')->with('success', 'Regra atualizada.');
    }
    public function toggle(FirewallRule $rule) {
        $rule->update(['enabled' => !$rule->enabled]);
        return back()->with('success', 'Regra ' . ($rule->enabled ? 'ativada' : 'desativada') . '.');
    }
    public function destroy(FirewallRule $rule) {
        $rule->delete();
        return redirect()->route('admin.rules.index')->with('success', 'Regra removida.');
    }
    public function iptables(FirewallRule $rule) {
        $cmd = "iptables -A {$rule->chain} -m string --string \"{$rule->domain}\" --algo bm -j {$rule->action}";
        return response()->json(['command' => $cmd]);
    }
    public function generateIptables() {
        $rules = FirewallRule::where('enabled', true)->get();
        $commands = $rules->map(fn($r) => "iptables -A {$r->chain} -m string --string \"{$r->domain}\" --algo bm -j {$r->action}")->toArray();
        return response()->json(['commands' => $commands]);
    }
}
