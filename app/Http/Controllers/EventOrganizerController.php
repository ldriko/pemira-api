<?php

namespace App\Http\Controllers;

use App\Models\EventOrganizer;
use Illuminate\Http\Request;

class EventOrganizerController extends Controller
{
    public function index($event)
    {
        $eo = EventOrganizer::where('event_id', $event)->get();
        return response()->json($eo);
    }

    public function show($event, $organizer)
    {
        $eo = EventOrganizer::where('event_id', $event)->where('id', $organizer)->get();
        return response()->json($eo);
    }

    public function store(Request $request, $event)
    {
        $request->validate([
            'npm' => 'required',
            'description' => 'required',
        ]);

        $eo = new EventOrganizer();
        $eo->npm = $request->input('npm');
        $eo->description = $request->input('description');
        $eo->event_id = $event;
        $eo->save(); 

        return response()->json(['message' => 'Event Organizer created successfully']);
    }

    public function destroy($event, $id)
    {
        $eo = EventOrganizer::find($id);

        if (!$eo) {
            return response()->json(['message' => 'Event Organizer not found'], 404);
        }

        $eo->delete();

        return response()->json(['message' => 'Event Organizer deleted successfully']);
    }
}
