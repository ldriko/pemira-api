<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventOrganizersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('event_organizers')->insert([
            'id' => 1,
            'event_id' => 1,
            'npm' => '22081010158',
            'description' => 'Pak ketua divisi web',
        ]);
        DB::table('event_organizers')->insert([
            'id' => 2,
            'event_id' => 1,
            'npm' => '22081010067',
            'description' => 'Anak buah bang heaven',
        ]);
    }
}
