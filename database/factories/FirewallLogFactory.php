<?php
namespace Database\Factories;

use App\Models\FirewallLog;
use App\Models\FirewallRule;
use Illuminate\Database\Eloquent\Factories\Factory;

class FirewallLogFactory extends Factory
{
    protected $model = FirewallLog::class;

    public function definition(): array
    {
        return [
            'rule_id' => FirewallRule::factory(),
            'source_ip' => fake()->ipv4(),
            'destination' => fake()->domainName(),
            'action' => fake()->randomElement(['blocked', 'allowed']),
            'protocol' => fake()->randomElement(['TCP', 'UDP', 'ICMP']),
        ];
    }
}
