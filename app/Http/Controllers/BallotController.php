<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ballot;
use App\Models\Division;
use App\Models\Candidate;
use Faker\Provider\Image;
use App\Models\BallotDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class BallotController extends Controller
{
    public function index($event)
    {
        $ballots = Ballot::where('event_id', $event)->get();
        return response()->json($ballots);
    }

    public function count($event)
    {
        $ballots_count = Ballot::where('event_id', $event)->count();
        return response()->json([
            "ballots_count" => $ballots_count
        ]);
    }

    public function store(Request $request, $event)
    {
        $closedEvent = Event::where('id', $event)->whereNotNull('close_election_at')->first();

        if ($closedEvent) {
            return response()->json([
                'success' => false,
                'message' => "Event sudah tertutup. Tidak dapat mengumpulkan surat suara."
            ], 409);
        }

        try {
            $request->validate([
                'details.*.division_id' => 'required|exists:divisions,id',
                'details.*.candidate_id' => 'required|exists:candidates,id',
                'ktm_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'verification_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
        } catch (ValidationException $exception) {
            $errors = $exception->validator->errors();
            $errorMessage = $errors->first();

            return response()->json([
                'success' => false,
                'message' => $errorMessage
            ], 409);
        }

        foreach ($request->details as $detail) {
            $division = Division::query()
                ->where('event_id', $event)
                ->where('id', $detail['division_id'])
                ->first();
            if (!$division) {
                return response()->json([
                    'success' => false,
                    'message' => "Ballot invalid"
                ], 409);
            }

            $candidate = Candidate::query()
                ->where('event_id', $event)
                ->where('id', $detail['candidate_id'])
                ->first();
            if (!$candidate) {
                return response()->json([
                    'success' => false,
                    'message' => "Ballot invalid"
                ], 409);
            }
        }

        if (Ballot::query()->where('event_id', $event)->where('npm', $request->user()->npm)->first()) {
            return response()->json([
                'success' => false,
                'message' => "User sudah mencoblos"
            ], 409);
        }

        $ballot = Ballot::query()->create([
            'event_id' => $event,
            'npm' => $request->user()->npm,
            'accepted' => 0
        ]);

        $ktmPicture = Storage::disk('public')->put(
            'events/ballots/ktm',
            $request->ktm_picture
        );
        $verificationPicture = Storage::disk('public')->put(
            'events/ballots/verification',
            $request->verification_picture
        );

        $ballot->ktm_picture = $ktmPicture;
        $ballot->verification_picture = $verificationPicture;

        foreach ($request->details as $detail) {
            BallotDetail::query()->create([
                'ballot_id' => $ballot->id,
                'division_id' => $detail['division_id'],
                'candidate_id' => $detail['candidate_id']
            ]);
        }

        return response()->json(['message' => 'ballot created successfully']);
    }

    public function accept(Request $request, $event, $ballot)
    {
        $ballot = Ballot::find($ballot);
        $ballot->accepted = 1;
        $ballot->accepted_by = $request->user()->npm;
        $ballot->save();

        return response()->json(['message' => 'ballot accepted successfully']);
    }

    public function reject(Request $request, $event, $ballot)
    {
        $ballot = Ballot::find($ballot);
        $ballot->accepted = 2;
        $ballot->accepted_by = $request->user()->npm;
        $ballot->save();

        return response()->json(['message' => 'ballot rejected successfully']);
    }

    public function next(Request $request, $event)
    {
        $ballots = Ballot::where('event_id', $event)->where('accepted', 0)->with('ballotDetails')->first();
        return response()->json($ballots);
    }
}
