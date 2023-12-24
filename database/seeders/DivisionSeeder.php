<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('divisions')->insert([
            'id' => 1,
            'event_id' => 1,
            // 'type' => 1,
            'name' => "BLJ 21",
        ]);

        DB::table('divisions')->insert([
            'id' => 2,
            'event_id' => 1,
            // 'type' => 2,
            'name' => "BLJ 22",
        ]);

        DB::table('divisions')->insert([
            'id' => 3,
            'event_id' => 1,
            // 'type' => 3,
            'name' => "BLJ 23",
        ]);

        DB::table('divisions')->insert([
            'id' => 4,
            'event_id' => 1,
            // 'type' => 4,
            'name' => "KAHIMA & WAKAHIMA",
        ]);
    }
}
