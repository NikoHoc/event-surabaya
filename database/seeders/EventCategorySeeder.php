<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('event_categories')->insert([
            [
                'id' => 1,
                'name' => 'Expo',
            ],
            [
                'id' => 2,
                'name' => 'Concert',
            ],
            [
                'id' => 3,
                'name' => 'Conference',
            ]
        ]);
    }
}
