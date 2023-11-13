<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function show()
    {
        $event = Event::all();
        return response()->json($event);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'logo' => 'required|string|min:6',
        ]);

        $event = new Event();
        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->logo = $request->input('logo');
        $event->save(); 

        return response()->json(['message' => 'Event created successfully']);
    }

    public function OpenElection(Request $request, $id)
    {
        $request->validate([
            'open_election_at' => 'required|date',
        ]);

        $event = Event::find($id);

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        $event->open_election_at = $request->input('open_election_at');
        $event->save();

        return response()->json(['message' => 'Event open date has set successfully']);
    }

    public function CloseElection(Request $request, $id)
    {
        $request->validate([
            'close_election_at' => 'required|date',
        ]);

        $event = Event::find($id);

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        $event->close_election_at = $request->input('close_election_at');
        $event->save();

        return response()->json(['message' => 'Event close date has set successfully']);
    }

    public function deleteEvent($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        $event->delete();

        return response()->json(['message' => 'Event deleted successfully']);
    }
}
