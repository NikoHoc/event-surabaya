<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('organizers')->insert([
            [
                'id' => 1,
                'name' => 'Southern Sydney University',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac velit vehicula, semper leo vitae, ultricies nulla.',
                'facebook_link' => 'https://facebook.com/southernsydneyuni',
                'x_link' => 'https://x.com/southernsydneyuni',
                'website_link' => 'https://southernsydneyuni.com',
            ],
            [
                'id' => 2,
                'name' => 'PT OSI',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ullamcorper sapien ut magna dictum, nec posuere justo euismod.',
                'facebook_link' => 'https://facebook.com/ptosi',
                'x_link' => 'https://x.com/ptosi',
                'website_link' => 'https://ptosi.com',
            ],
            [
                'id' => 3,
                'name' => 'OBKG',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean facilisis diam nec nisi malesuada varius.',
                'facebook_link' => 'https://facebook.com/obkg',
                'x_link' => 'https://x.com/obkg',
                'website_link' => 'https://obkg.com',
            ],
            [
                'id' => 4,
                'name' => 'MSW Global',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas eget erat id turpis scelerisque viverra.',
                'facebook_link' => 'https://facebook.com/mswglobal',
                'x_link' => 'https://x.com/mswglobal',
                'website_link' => 'https://mswglobal.com',
            ],
            [
                'id' => 5,
                'name' => 'HWG',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse potenti. In hac habitasse platea dictumst.',
                'facebook_link' => 'https://facebook.com/hwg',
                'x_link' => 'https://x.com/hwg',
                'website_link' => 'https://hwg.com',
            ],
            [
                'id' => 6,
                'name' => 'Debindo',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id odio ut lectus vehicula cursus a vel magna.',
                'facebook_link' => 'https://facebook.com/debindo',
                'x_link' => 'https://x.com/debindo',
                'website_link' => 'https://debindo.com',
            ]
        ]);
    }
}
