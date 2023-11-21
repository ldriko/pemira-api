<?php

namespace App\Http\Controllers;

use App\Models\Ballot;
use Illuminate\Http\Request;

class BallotController extends Controller
{
    public function show($id)
    {
        $divisions = Ballot::where('event_id', $id)->get();
        return response()->json($divisions);
    }

    public function store(Request $request,$npm, $id)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        // ]);

        $ballot = new Ballot();
        $ballot->event_id = $id;
        $ballot->npm = $npm;
        $ballot->ktm_picture = $request->input('ktm_picture');
        $ballot->verification_picture = $request->input('verification_picture');
        $ballot->save(); 

        return response()->json(['message' => 'ballot created successfully']);
    }
}
