<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // 'id' => 1,
            'npm' => '0',
            'name' => 'root',
            'email' => 'root@pemira.com',
            'password' => Hash::make('password'),
            'role' => 1,

        ]);

        DB::table('users')->insert([
            // 'id' => 2,
            'npm' => '22081010158',
            'name' => 'Heaven Ade Aldrico',
            'email' => '22081010158@student.upnjatim.ac.id',
            'password' => Hash::make('password'),
            'role' => 2,
        ]);

        DB::table('users')->insert([
            // 'id' => 3,
            'npm' => '22081010067',
            'name' => 'Gayuh Abdi Mahardika',
            'email' => '22081010067@student.upnjatim.ac.id',
            'password' => Hash::make('password'),
            'role' => 2,
        ]);

        DB::table('users')->insert([
            // 'id' => 4,
            'npm' => '22081010140',
            'name' => 'Jerry Ramadhani Cahyas',
            'email' => '22081010140@student.upnjatim.ac.id',
            'password' => Hash::make('password'),
            'role' => 3,
        ]);
    }
}
