<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DivisionController extends Controller
{
    public function index($id)
    {
        $divisions = Division::where('event_id', $id)->get();
        return response()->json($divisions);
    }

    public function show($event, $id)
    {
        $division = Division::where('event_id', $event)->where('id', $id)->get();
        return response()->json($division);
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $division = new Division();
        $division->event_id = $id;
        $division->name = $request->input('name');
        $division->save();

        return response()->json(['message' => 'Division created successfully']);
    }

    public function update(Request $request,$event, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $division = Division::where('event_id', $event)->where('id', $id)->first();

        if (!$division) {
            return response()->json(['message' => 'Division not found'], 404);
        }


        $division->update([
            'name' => $request->input('name'),
        ]);

        // Redirect atau berikan respons sesuai kebutuhan aplikasi Anda
        return response()->json(['message' => 'Division updated successfully']);
    }

    public function destroy($event, $id)
    {
        $division = Division::where('event_id', $event)->where('id', $id)->first();
        $candidates = Candidate::where('division_id', $id)->get();

        if (!$division) {
            return response()->json(['message' => 'Division not found'], 404);
        }

        if ($candidates->count() > 0) {
            return response()->json(['message' => 'Cannot delete division. Division is associated with candidates.'], 400);
        }

        $division->delete();

        return response()->json(['message' => 'Division deleted successfully']);
    }
}
