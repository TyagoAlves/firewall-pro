<?php
namespace Database\Factories;

use App\Models\FirewallRule;
use Illuminate\Database\Eloquent\Factories\Factory;

class FirewallRuleFactory extends Factory
{
    protected $model = FirewallRule::class;

    public function definition(): array
    {
        return [
            'name' => fake()->sentence(2),
            'domain' => fake()->domainName(),
            'chain' => fake()->randomElement(['FORWARD', 'OUTPUT', 'INPUT']),
            'action' => fake()->randomElement(['DROP', 'REJECT', 'ACCEPT']),
            'enabled' => true,
            'description' => fake()->optional()->sentence(),
        ];
    }
}
