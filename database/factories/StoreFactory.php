<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => $title = str(fake()->word())->title(),
            'slug' => str($title)->slug(),
            'description' => fake()->paragraph(1, true),
            'status' => \App\Enums\StoreStatus::ACTIVE
        ];
    }
}
