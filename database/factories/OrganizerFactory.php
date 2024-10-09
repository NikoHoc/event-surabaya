<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organizer>
 */
class OrganizerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'name' => fake()->firstName(),
            // 'description' => fake()->realText(),
            // 'facebook_link' => fake()->url(),
            // 'x_link' => fake()->url(),
            // 'website_link' => fake()->url(),
            // 'created_at' => Carbon::createFromFormat('Y-m-d H', '1975-05-21 22'),
            // 'updated_at' => Carbon::createFromFormat('Y-m-d H', '1975-05-21 22'),
        ];
    }
}
