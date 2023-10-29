<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            'id' => 1,
            'title' => 'Pemira Sandbox',
            'description' => 'Hanya Sandbox, jangan di anggap serius, sanss',
            'logo' => 'pemirasandbox.png',
            'open_election_at' => '2023-10-29 23:40:27',
            'close_election_at' => '2023-12-29 23:40:27',
        ]);
    }
}
