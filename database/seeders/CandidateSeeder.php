<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('candidates')->insert([
            'id' => 1,
            'event_id' => 1,
            'division_id' => 1,
            'first' => "Aswin",
            'vision' => "Menjadi juara 1 LKS Tingkat Internasional",
            'mission' => "Mission failed, we will get them next time",
            'picture' => "aswin1.jpg",
            'created_by' => "22081010158",
        ]);
        DB::table('candidates')->insert([
            'id' => 2,
            'event_id' => 1,
            'division_id' => 2,
            'first' => "Arung",
            'vision' => "Menjadi juara 2 LKS Tingkat Internasional",
            'mission' => "Mission failed, we will get them next time",
            'picture' => "aswin2.jpg",
            'created_by' => "22081010158",
        ]);
        DB::table('candidates')->insert([
            'id' => 3,
            'event_id' => 1,
            'division_id' => 3,
            'first' => "Ilmi",
            'vision' => "Menjadi juara 3 LKS Tingkat Internasional",
            'mission' => "Mission failed, we will get them next time",
            'picture' => "aswin3.jpg",
            'created_by' => "22081010158",
        ]);
        DB::table('candidates')->insert([
            'id' => 4,
            'event_id' => 1,
            'division_id' => 4,
            'first' => "Jerry Ramadhan Cahyas",
            'second' => "Gayuh Abdi mahardika",
            'vision' => "Tidak mau jadi kahima dan wakahima, jadi divisi web saja",
            'mission' => "semoga berhasil",
            'picture' => "jerry_dan_gayuh.jpg",
            'created_by' => "22081010158",
        ]);

        DB::table('candidates')->insert([
            'id' => 5,
            'event_id' => 1,
            'division_id' => 1,
            'first' => "Aswin 2",
            'vision' => "Menjadi juara 1 LKS Tingkat Internasional",
            'mission' => "Mission failed, we will get them next time",
            'picture' => "aswin1.jpg",
            'created_by' => "22081010158",
        ]);
        DB::table('candidates')->insert([
            'id' => 6,
            'event_id' => 1,
            'division_id' => 2,
            'first' => "Arung 2",
            'vision' => "Menjadi juara 2 LKS Tingkat Internasional",
            'mission' => "Mission failed, we will get them next time",
            'picture' => "aswin2.jpg",
            'created_by' => "22081010158",
        ]);
        DB::table('candidates')->insert([
            'id' => 7,
            'event_id' => 1,
            'division_id' => 3,
            'first' => "Ilmi 2",
            'vision' => "Menjadi juara 3 LKS Tingkat Internasional",
            'mission' => "Mission failed, we will get them next time",
            'picture' => "aswin3.jpg",
            'created_by' => "22081010158",
        ]);
        DB::table('candidates')->insert([
            'id' => 8,
            'event_id' => 1,
            'division_id' => 4,
            'first' => "Jerry Ramadhan Cahyas 2",
            'second' => "Gayuh Abdi mahardika 2",
            'vision' => "Tidak mau jadi kahima dan wakahima, jadi divisi web saja",
            'mission' => "semoga berhasil",
            'picture' => "jerry_dan_gayuh.jpg",
            'created_by' => "22081010158",
        ]);
    }
}
