<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\Division;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TutorialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            'npm' => '0',
            'name' => 'root',
            'email' => 'root@pemira.com',
            'password' => Hash::make('password'),
            'role' => 1,
        ]);

        $event = Event::query()->create([
            'title' => 'PEMIRA',
            'description' => 'Hima KM Informatika 2024',
            'logo' => 'events/logo/pemira.png'
        ]);

        $divisions = ['BLJ Angkatan 2023', 'BLJ Angkatan 2022', 'BLJ Angkatan 2021', 'KAHIMA & WAKAHIMA'];

        foreach ($divisions as $division) {
            Division::query()->create([
                'event_id' => $event->id,
                'name' => $division
            ]);
        }

        Candidate::query()->create([
            'event_id' => $event->id,
            'division_id' => 1,
            'order' => '1',
            'first' => '0000001',
            'first_name' => 'Calon Pertama',
            'second' => null,
            'second_name' => null,
            'vision' => '-',
            'mission' => '-',
            'picture' => 'events/candidates/noone.jpg',
            'created_by' => 0
        ]);

        Candidate::query()->create([
            'event_id' => $event->id,
            'division_id' => 1,
            'order' => '2',
            'first' => '0000002',
            'first_name' => 'Calon Kedua',
            'second' => null,
            'second_name' => null,
            'vision' => '-',
            'mission' => '-',
            'picture' => 'events/candidates/noone.jpg',
            'created_by' => 0
        ]);

        Candidate::query()->create([
            'event_id' => $event->id,
            'division_id' => 1,
            'order' => '3',
            'first' => '0000003',
            'first_name' => 'Calon Ketiga',
            'second' => null,
            'second_name' => null,
            'vision' => '-',
            'mission' => '-',
            'picture' => 'events/candidates/noone.jpg',
            'created_by' => 0
        ]);

        Candidate::query()->create([
            'event_id' => $event->id,
            'division_id' => 1,
            'order' => '4',
            'first' => '0000004',
            'first_name' => 'Calon Keempat',
            'second' => null,
            'second_name' => null,
            'vision' => '-',
            'mission' => '-',
            'picture' => 'events/candidates/noone.jpg',
            'created_by' => 0
        ]);

        Candidate::query()->create([
            'event_id' => $event->id,
            'division_id' => 2,
            'order' => '1',
            'first' => '0000012',
            'first_name' => 'Calon Pertama',
            'second' => null,
            'second_name' => null,
            'vision' => '-',
            'mission' => '-',
            'picture' => 'events/candidates/noone.jpg',
            'created_by' => 0
        ]);

        Candidate::query()->create([
            'event_id' => $event->id,
            'division_id' => 2,
            'order' => '2',
            'first' => '0000012',
            'first_name' => 'Calon Kedua',
            'second' => null,
            'second_name' => null,
            'vision' => '-',
            'mission' => '-',
            'picture' => 'events/candidates/noone.jpg',
            'created_by' => 0
        ]);

        Candidate::query()->create([
            'event_id' => $event->id,
            'division_id' => 2,
            'order' => '3',
            'first' => '0000013',
            'first_name' => 'Calon Ketiga',
            'second' => null,
            'second_name' => null,
            'vision' => '-',
            'mission' => '-',
            'picture' => 'events/candidates/noone.jpg',
            'created_by' => 0
        ]);

        Candidate::query()->create([
            'event_id' => $event->id,
            'division_id' => 2,
            'order' => '4',
            'first' => '0000014',
            'first_name' => 'Calon Keempat',
            'second' => null,
            'second_name' => null,
            'vision' => '-',
            'mission' => '-',
            'picture' => 'events/candidates/noone.jpg',
            'created_by' => 0
        ]);

        Candidate::query()->create([
            'event_id' => $event->id,
            'division_id' => 3,
            'order' => '1',
            'first' => '0000021',
            'first_name' => 'Calon Pertama',
            'second' => null,
            'second_name' => null,
            'vision' => '-',
            'mission' => '-',
            'picture' => 'events/candidates/noone.jpg',
            'created_by' => 0
        ]);

        Candidate::query()->create([
            'event_id' => $event->id,
            'division_id' => 3,
            'order' => '2',
            'first' => '0000022',
            'first_name' => 'Calon Kedua',
            'second' => null,
            'second_name' => null,
            'vision' => '-',
            'mission' => '-',
            'picture' => 'events/candidates/noone.jpg',
            'created_by' => 0
        ]);

        Candidate::query()->create([
            'event_id' => $event->id,
            'division_id' => 3,
            'order' => '3',
            'first' => '0000023',
            'first_name' => 'Calon Ketiga',
            'second' => null,
            'second_name' => null,
            'vision' => '-',
            'mission' => '-',
            'picture' => 'events/candidates/noone.jpg',
            'created_by' => 0
        ]);

        Candidate::query()->create([
            'event_id' => $event->id,
            'division_id' => 3,
            'order' => '4',
            'first' => '0000024',
            'first_name' => 'Calon Keempat',
            'second' => null,
            'second_name' => null,
            'vision' => '-',
            'mission' => '-',
            'picture' => 'events/candidates/noone.jpg',
            'created_by' => 0
        ]);

        Candidate::query()->create([
            'event_id' => $event->id,
            'division_id' => 4,
            'order' => '1',
            'first' => '0000031',
            'first_name' => 'Paslon Pertama',
            'second' => null,
            'second_name' => null,
            'vision' => '-',
            'mission' => '-',
            'picture' => 'events/candidates/noone.jpg',
            'created_by' => 0
        ]);

        Candidate::query()->create([
            'event_id' => $event->id,
            'division_id' => 4,
            'order' => '2',
            'first' => '0000032',
            'first_name' => 'Paslon Kedua',
            'second' => null,
            'second_name' => null,
            'vision' => '-',
            'mission' => '-',
            'picture' => 'events/candidates/noone.jpg',
            'created_by' => 0
        ]);
    }
}
