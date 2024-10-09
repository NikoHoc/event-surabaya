<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Event;
use App\Models\EventCategory;
use App\Models\Organizer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // EventCategory::factory(3)->create();
        // Organizer::factory(5)->create();
        // Event::factory(6)->create();

        $this->call(EventCategorySeeder::class);
        $this->call(OrganizerSeeder::class);
        $this->call(EventSeeder::class);
    } 
}
