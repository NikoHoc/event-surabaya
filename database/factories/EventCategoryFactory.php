<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventCategory>
 */
class EventCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->title(),
            'created_at' => Carbon::createFromFormat('Y-m-d H', '1975-05-21 22'),
            'updated_at' => Carbon::createFromFormat('Y-m-d H', '1975-05-21 22'),
        ];
    }
}
