<?php

namespace Database\Seeders;

use App\Models\Ballot;
use App\Models\BallotDetail;
use App\Models\Division;
use App\Models\User;
use Illuminate\Database\Seeder;

class DummyBallotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory()->count(100)->create();

        foreach ($users as $user) {
            $weights = array(0 => 0.3, 1 => 0.7);
            $rand = (float)rand() / (float)getrandmax();
            $result = 0;

            foreach ($weights as $value => $weight) {
                if ($rand < $weight) {
                    $result = $value;
                    break;
                }
                $rand -= $weight;
            }

            $ballot = Ballot::query()->create([
                'event_id' => 1,
                'npm' => $user->npm,
                'ktm_picture' => 'ktm.png',
                'verification_picture' => 'verification.png',
                'accepted' => $result,
                'accepted_by' => '22081010158',
            ]);

            $divisions = Division::all();

            foreach ($divisions as $division) {
                BallotDetail::query()->create([
                    'division_id' => $division->id,
                    'ballot_id' => $ballot->id,
                    'candidate_id' => $division->candidates
                        ->random()
                        ->id,
                ]);
            }
        }
    }
}
