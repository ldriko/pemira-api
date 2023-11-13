<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function show($id)
    {
        $divisions = Division::where('event_id', $id)->get();
        return response()->json($divisions);
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
    
    public function delete($id)
    {
        $event = Division::find($id);

        if (!$event) {
            return response()->json(['message' => 'Division not found'], 404);
        }

        $event->delete();

        return response()->json(['message' => 'Division deleted successfully']);
    }
}
