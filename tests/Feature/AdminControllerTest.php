<?php
namespace Tests\Feature;

use App\Models\FirewallLog;
use App\Models\FirewallRule;
use App\Models\User;
use Database\Factories\FirewallLogFactory;
use Database\Factories\FirewallRuleFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create();
    }

    public function test_dashboard_requires_auth(): void
    {
        $this->get('/admin')->assertRedirect('/login');
    }

    public function test_dashboard_loads(): void
    {
        FirewallRule::factory()->count(3)->create();
        FirewallLog::factory()->count(2)->create();

        $this->actingAs($this->admin)
            ->get('/admin')
            ->assertStatus(200);
    }

    public function test_rules_index(): void
    {
        FirewallRule::factory()->count(3)->create();

        $this->actingAs($this->admin)
            ->get('/admin/rules')
            ->assertStatus(200)
            ->assertSee('Regras');
    }

    public function test_rules_create_page(): void
    {
        $this->actingAs($this->admin)
            ->get('/admin/rules/create')
            ->assertStatus(200);
    }

    public function test_rules_store(): void
    {
        $data = [
            'name' => 'Bloquear Teste',
            'domain' => 'teste.com',
            'chain' => 'FORWARD',
            'action' => 'DROP',
        ];

        $this->actingAs($this->admin)
            ->post('/admin/rules', $data)
            ->assertRedirect('/admin/rules');

        $this->assertDatabaseHas('firewall_rules', ['domain' => 'teste.com']);
    }

    public function test_rules_edit(): void
    {
        $rule = FirewallRule::factory()->create();

        $this->actingAs($this->admin)
            ->get("/admin/rules/{$rule->id}/edit")
            ->assertStatus(200);
    }

    public function test_rules_update(): void
    {
        $rule = FirewallRule::factory()->create();

        $this->actingAs($this->admin)
            ->put("/admin/rules/{$rule->id}", ['name' => 'Updated', 'domain' => 'updated.com', 'chain' => 'INPUT', 'action' => 'REJECT'])
            ->assertRedirect('/admin/rules');

        $this->assertDatabaseHas('firewall_rules', ['domain' => 'updated.com']);
    }

    public function test_rules_toggle(): void
    {
        $rule = FirewallRule::factory()->create(['enabled' => true]);

        $this->actingAs($this->admin)
            ->patch("/admin/rules/{$rule->id}/toggle")
            ->assertStatus(302);

        $this->assertFalse($rule->fresh()->enabled);
    }

    public function test_rules_delete(): void
    {
        $rule = FirewallRule::factory()->create();

        $this->actingAs($this->admin)
            ->delete("/admin/rules/{$rule->id}")
            ->assertRedirect('/admin/rules');

        $this->assertDatabaseMissing('firewall_rules', ['id' => $rule->id]);
    }

    public function test_rules_iptables(): void
    {
        $rule = FirewallRule::factory()->create(['domain' => 'exemplo.com', 'chain' => 'FORWARD', 'action' => 'DROP']);

        $this->actingAs($this->admin)
            ->get("/admin/rules/{$rule->id}/iptables")
            ->assertStatus(200)
            ->assertJson(['command' => "iptables -A FORWARD -m string --string \"exemplo.com\" --algo bm -j DROP"]);
    }

    public function test_generate_iptables(): void
    {
        FirewallRule::factory()->create(['domain' => 'site1.com', 'enabled' => true]);
        FirewallRule::factory()->create(['domain' => 'site2.com', 'enabled' => false]);

        $this->actingAs($this->admin)
            ->get('/admin/generate-iptables')
            ->assertStatus(200)
            ->assertJsonCount(1, 'commands');
    }

    public function test_logs_index(): void
    {
        FirewallLog::factory()->count(3)->create();

        $this->actingAs($this->admin)
            ->get('/admin/logs')
            ->assertStatus(200);
    }

    public function test_settings_index(): void
    {
        $this->actingAs($this->admin)
            ->get('/admin/settings')
            ->assertStatus(200);
    }

    public function test_settings_update(): void
    {
        $this->actingAs($this->admin)
            ->post('/admin/settings', ['key' => 'timezone', 'value' => 'America/Sao_Paulo'])
            ->assertStatus(302);
    }
}
