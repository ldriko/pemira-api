<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WhiteListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('white_lists')->insert([
            'id' => 0,
            'event_id' => 1,
            'npm' => "2208101140",
        ]);
        DB::table('white_lists')->insert([
            'id' => 0,
            'event_id' => 1,
            'npm' => "2208101067",
        ]);
        DB::table('white_lists')->insert([
            'id' => 0,
            'event_id' => 1,
            'npm' => "2208101158",
        ]);
    }
}
