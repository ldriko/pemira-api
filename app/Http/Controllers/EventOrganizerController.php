<?php

namespace App\Http\Controllers;

use App\Models\EventOrganizer;
use Illuminate\Http\Request;

class EventOrganizerController extends Controller
{
    public function index($event)
    {
        $eo = EventOrganizer::where('event_id', $event)->get();

        if ($eo->isEmpty()) {
            return response()->json(['message' => 'Event organizers not found'], 404);
        }

        return response()->json($eo);
    }

    public function show($event, $organizer)
    {
        $eo = EventOrganizer::where('event_id', $event)->where('id', $organizer)->first();

        if ($eo->isEmpty()) {
            return response()->json(['message' => 'Event organizers not found'], 404);
        }

        return response()->json($eo);
    }

    public function store(Request $request, $event)
    {
        $request->validate([
            'npm' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $eo = new EventOrganizer();
        $eo->npm = $request->input('npm');
        $eo->description = $request->input('description');
        $eo->event_id = $event;
        $eo->save(); 

        return response()->json(['message' => 'Event Organizer created successfully']);
    }

    public function update(Request $request,$event, $id)
    {
        $request->validate([
            'npm' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $eo = EventOrganizer::where('event_id', $event)->where('id', $id)->first();

        if (!$eo) {
            return response()->json(['message' => 'Event Organizer not found'], 404);
        }


        $eo->update([
            'npm' => $request->input('npm'),
            'description' => $request->input('description'),
        ]);

        return response()->json(['message' => 'Event Organizer updated successfully']);
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
