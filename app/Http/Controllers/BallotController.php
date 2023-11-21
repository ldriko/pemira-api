<?php

namespace App\Http\Controllers;

use App\Models\Ballot;
use Illuminate\Http\Request;

class BallotController extends Controller
{
    public function index($event)
    {
        $ballots = Ballot::where('event_id', $event)->get();
        return response()->json($ballots);
    }

    public function store(Request $request, $event)
    {

        $ballot = new Ballot();
        $ballot->event_id = $id;
        $ballot->npm = $npm;
        $ballot->ktm_picture = $request->input('ktm_picture');
        $ballot->verification_picture = $request->input('verification_picture');
        $ballot->save(); 

        return response()->json(['message' => 'ballot created successfully']);
    }
}
