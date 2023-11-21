<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class candidatesController extends Controller
{
    public function index($id)
    {
        $candidates = Candidate::where('event_id', $id)->get();
        return response()->json($candidates);
    }

    public function store(Request $request, $id)
    {
        // $request->validate([
        //     // 'name' => 'required|string|max:255',
        // ]);

        $candidate = new Candidate();
        $candidate->event_id = $id;
        $candidate->division_id = $request->input('division_id');
        $candidate->first = $request->input('first');
        $candidate->second = $request->input('second');
        $candidate->vision = $request->input('vision');
        $candidate->mission = $request->input('mission');
        $candidate->picture = $request->input('picture');
        $candidate->created_by = $request->user()->npm;
        $candidate->save(); 

        return response()->json(['message' => 'candidates created successfully']);
    }

    public function show($event, $candidate)
    {
        $candidate = Candidate::where('event_id', $event)->where('id', $candidate)->get();
        return response()->json($candidate);
    }

    public function update(Request $request, $id)
    {
        $candidate = Candidate::find($id);
        
        // $request->validate([
        //     'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        $candidate->update([
            'created_by' => $request->input('picture'),
        ]);

        return response()->json(['message' => 'candidate updated successfully']);
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
}
