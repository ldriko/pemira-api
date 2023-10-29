<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BallotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ballots')->insert([
            'id' => 1,
            'npm' => "22081010067",
            'event_id' => 1,
            'ktm_picture' => "ktm.png",
            'verification_picture' => "verification.png",
            'candidate1' => 1,
            'candidate2' => 2,
            'candidate3' => 3,
            'candidate4' => 4,
            'accepted'   => 1,
            'accepted_by'   => "22081010158",
        ]);

        DB::table('ballots')->insert([
            'id' => 2,
            'npm' => "22081010140",
            'event_id' => 1,
            'ktm_picture' => "ktm2.png",
            'verification_picture' => "verification2.png",
            'candidate1' => 5,
            'candidate2' => 6,
            'candidate3' => 7,
            'candidate4' => 8,
            'accepted'   => 0,
            'accepted_by'   => "22081010158",
        ]);
    }
}
