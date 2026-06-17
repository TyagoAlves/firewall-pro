<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index() {
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('admin.settings', compact('settings'));
    }
    public function update(Request $request) {
        foreach ($request->except('_token', '_method') as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        return back()->with('success', 'Configurações salvas.');
    }
    public function generateToken(Request $request) {
        $token = $request->user()->createToken('api-access')->plainTextToken;
        return back()->with('api_token', $token);
    }
}
