<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            [
                'name' => "Chelsea",
                'logo_url' => "https://resources.premierleague.com/premierleague/badges/25/t8.png",
                'max_strength' => 96,
            ],
            [
                'name' => "Aston Villa",
                'logo_url' => "https://resources.premierleague.com/premierleague/badges/25/t7.png",
                'max_strength' => 88,
            ],
            [
                'name' => "Arsenal",
                'logo_url' => "https://resources.premierleague.com/premierleague/badges/25/t3.png",
                'max_strength' => 80,
            ],
            [
                'name' => "Fulham",
                'logo_url' => "https://resources.premierleague.com/premierleague/badges/25/t54.png",
                'max_strength' => 75,
            ],
        ]);
    }
}
