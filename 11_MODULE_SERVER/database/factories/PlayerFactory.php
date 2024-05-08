<?php

namespace Database\Factories;

use App\Models\Club;
use App\Models\Nationality;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => fake()->name(),
            'email' => fake()->freeEmail(),
            'password' => bcrypt('password'),
            'height' => rand(150,200),
            'weight' => rand(40,95),
            'squad_number' => rand(10,99),
            // 'club_id' => 0,
            // 'positions_id' => 0,
            // 'nationality_id' => 0,
            'active' => fake()->boolean(80),
        ];
    }
}
