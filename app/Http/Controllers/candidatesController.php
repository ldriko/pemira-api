<?php

namespace App\Http\Controllers;

use App\Models\BallotDetail;
use App\Models\Candidate;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class CandidatesController extends Controller
{
    public function index($id)
    {
        $candidates = Candidate::where('event_id', $id)->get();
        return response()->json($candidates);
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'division_id' => 'required|string',
            'first' => 'required|string',
            'second' => 'required|string',
            'vision' => 'required|string',
            'mission' => 'required|string',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif'
        ]);

        $candidate = new Candidate();
        $candidate->event_id = $id;
        $candidate->division_id = $request->input('division_id');
        $candidate->first = $request->input('first');
        $candidate->second = $request->input('second');
        $candidate->vision = $request->input('vision');
        $candidate->mission = $request->input('mission');

        $candidatespicture = $request->file('picture');
        $candidatesfileName = $candidate->division_id . '_' . date('YmdHis') . '_' . $candidatespicture->getClientOriginalName();
        $candidatespicture->storeAs('images/candidates', $candidatesfileName);
        $candidate->picture = $candidatesfileName;

        $candidate->created_by = $request->user()->npm;
        $candidate->save();

        return response()->json(['message' => 'Candidate created successfully']);
    }

    public function update(Request $request, $event, $id)
    {
        $request->validate([
            'division_id' => 'required|string',
            'first' => 'required|string',
            'second' => 'required|string',
            'vision' => 'required|string',
            'mission' => 'required|string',
            'picture' => 'image|mimes:jpeg,png,jpg,gif'
        ]);

        $candidate = Candidate::where('event_id', $event)->where('id', $id)->first();

        if (!$candidate) {
            return response()->json(['message' => 'Candidate not found'], 404);
        }

        if ($request->hasFile('picture')) {
            $oldImagePath = $candidate->picture;
            Storage::delete('images/candidates/' . $oldImagePath);

            $image = $request->file('picture');
            $path = $image->store('images/candidates',);
            $candidate->picture = $path;
        }

        $candidate->update([
            'division_id' => $request->input('division_id'),
            'first' => $request->input('first'),
            'second' => $request->input('second'),
            'vision' => $request->input('vision'),
            'mission' => $request->input('mission'),
        ]);

        return response()->json(['message' => 'Candidate updated successfully']);
    }

    public function show($event, $candidate)
    {
        $candidate = Candidate::where('event_id', $event)->where('id', $candidate)->get();
        return response()->json($candidate);
    }

    public function destroy($event, $candidate)
    {
        $candidate = Candidate::find($candidate);

        if (!$candidate) {
            return response()->json(['message' => 'candidate not found'], 404);
        }

        $candidate->delete();

        return response()->json(['message' => 'candidate deleted successfully']);
    }

    public function ballots($id)
    {
        $candidates = Division::where('event_id', $id)->get();
        return response()->json($candidates);
    }
}
