<?php
namespace Tests\Feature;

use App\Models\FirewallLog;
use App\Models\FirewallRule;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ApiControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_unauthorized_access(): void
    {
        $this->getJson('/api/rules')->assertStatus(401);
    }

    public function test_list_rules(): void
    {
        Sanctum::actingAs($this->user);
        FirewallRule::factory()->count(3)->create();

        $this->getJson('/api/rules')
            ->assertStatus(200)
            ->assertJsonCount(3, 'data');
    }

    public function test_create_rule(): void
    {
        Sanctum::actingAs($this->user);
        $data = [
            'name' => 'Bloquear API Test',
            'domain' => 'apitest.com',
            'chain' => 'FORWARD',
            'action' => 'DROP',
        ];

        $this->postJson('/api/rules', $data)
            ->assertStatus(201)
            ->assertJson(['domain' => 'apitest.com']);
    }

    public function test_show_rule(): void
    {
        Sanctum::actingAs($this->user);
        $rule = FirewallRule::factory()->create();

        $this->getJson("/api/rules/{$rule->id}")
            ->assertStatus(200)
            ->assertJson(['id' => $rule->id]);
    }

    public function test_update_rule(): void
    {
        Sanctum::actingAs($this->user);
        $rule = FirewallRule::factory()->create();

        $this->putJson("/api/rules/{$rule->id}", ['name' => 'Updated'])
            ->assertStatus(200)
            ->assertJson(['name' => 'Updated']);
    }

    public function test_delete_rule(): void
    {
        Sanctum::actingAs($this->user);
        $rule = FirewallRule::factory()->create();

        $this->deleteJson("/api/rules/{$rule->id}")
            ->assertStatus(200);

        $this->assertDatabaseMissing('firewall_rules', ['id' => $rule->id]);
    }

    public function test_list_logs(): void
    {
        Sanctum::actingAs($this->user);
        $rule = FirewallRule::factory()->create();
        FirewallLog::factory()->count(2)->create(['rule_id' => $rule->id]);

        $this->getJson('/api/logs')
            ->assertStatus(200)
            ->assertJsonCount(2, 'data');
    }

    public function test_stats(): void
    {
        Sanctum::actingAs($this->user);
        $rule = FirewallRule::factory()->create(['enabled' => true]);
        FirewallRule::factory()->create(['enabled' => false]);
        FirewallLog::factory()->create(['action' => 'blocked', 'rule_id' => $rule->id]);

        $this->getJson('/api/stats')
            ->assertStatus(200)
            ->assertJson([
                'total_rules' => 2,
                'enabled_rules' => 1,
                'total_logs' => 1,
            ]);
    }

    public function test_iptables(): void
    {
        Sanctum::actingAs($this->user);
        FirewallRule::factory()->create(['domain' => 'site.com', 'enabled' => true]);
        FirewallRule::factory()->create(['domain' => 'disabled.com', 'enabled' => false]);

        $this->getJson('/api/iptables')
            ->assertStatus(200)
            ->assertJsonCount(1, 'commands');
    }
}
