<?php
namespace Database\Seeders;
use App\Models\FirewallRule;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@firewallpro.com',
            'password' => bcrypt('admin123'),
        ]);
        $rules = [
            ['name' => 'Bloquear YouTube', 'domain' => 'youtube.com', 'chain' => 'FORWARD', 'action' => 'DROP'],
            ['name' => 'Bloquear TikTok', 'domain' => 'tiktok.com', 'chain' => 'FORWARD', 'action' => 'DROP'],
            ['name' => 'Bloquear Instagram', 'domain' => 'instagram.com', 'chain' => 'FORWARD', 'action' => 'DROP'],
            ['name' => 'Bloquear Netflix', 'domain' => 'netflix.com', 'chain' => 'FORWARD', 'action' => 'DROP'],
            ['name' => 'Bloquear Facebook', 'domain' => 'facebook.com', 'chain' => 'FORWARD', 'action' => 'DROP'],
        ];
        foreach ($rules as $rule) {
            FirewallRule::create($rule);
        }
        Setting::create(['key' => 'app_name', 'value' => 'Alpine Firewall Pro']);
        Setting::create(['key' => 'lgpd_contact', 'value' => 'contato@firewallpro.com']);
    }
}
