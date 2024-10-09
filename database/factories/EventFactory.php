<?php

namespace Database\Factories;

use App\Models\EventCategory;
use App\Models\Organizer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'title' => fake()->title(),
            // 'venue' => fake()->streetName(),
            // 'date' => Carbon::parse(fake()->dateTimeThisYear)->format('Y-m-d'),
            // 'start_time' => Carbon::parse(fake()->time())->format('H:i:s'),
            // 'description' => fake()->text(),
            // 'booking_url' => fake()->url(),
            // 'tags' => json_encode(fake()->words(3)),
            // 'organizer_id' => Organizer::factory(),
            // 'event_category_id'=> EventCategory::factory(),
            // 'created_at' => Carbon::createFromFormat('Y-m-d H', '1975-05-21 22'),
            // 'updated_at' => Carbon::createFromFormat('Y-m-d H', '1975-05-21 22'),
        ];
    }
}
