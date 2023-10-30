<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BallotDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ballot_details')->insert([
            'id' => 1, 
            'ballot_id' => 1, 
            'candidate_id' => 1, 
        ]);
        DB::table('ballot_details')->insert([
            'id' => 2, 
            'ballot_id' => 1, 
            'candidate_id' => 2, 
        ]);
        DB::table('ballot_details')->insert([
            'id' => 3, 
            'ballot_id' => 1, 
            'candidate_id' => 3, 
        ]);
        DB::table('ballot_details')->insert([
            'id' => 4, 
            'ballot_id' => 1, 
            'candidate_id' => 4, 
        ]);
        DB::table('ballot_details')->insert([
            'id' => 5, 
            'ballot_id' => 2, 
            'candidate_id' => 5, 
        ]);
        DB::table('ballot_details')->insert([
            'id' => 6, 
            'ballot_id' => 2, 
            'candidate_id' => 6, 
        ]);
        DB::table('ballot_details')->insert([
            'id' => 7, 
            'ballot_id' => 2, 
            'candidate_id' => 7, 
        ]);
        DB::table('ballot_details')->insert([
            'id' => 8, 
            'ballot_id' => 2, 
            'candidate_id' => 8, 
        ]);
    }
}
