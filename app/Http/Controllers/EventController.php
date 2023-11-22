<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $event = Event::all();
        return response()->json($event);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $event = new Event();
        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->logo = $request->input('logo');
        $event->save(); 

        return response()->json(['message' => 'Event created successfully']);
    }

    public function show($event)
    {
        $candidate = Event::where('id', $event)->get();
        return response()->json($candidate);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user = Event::findOrFail($id);

        $user->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'logo' => $request->input('logo'),
        ]);

        // Redirect atau berikan respons sesuai kebutuhan aplikasi Anda
        return response()->json(['message' => 'Event updated successfully']);
    }

    public function OpenElection(Request $request, $event)
    {

        $events = Event::find($event);

        if (!$events) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        $events->open_election_at = now();
        $events->save();

        return response()->json(['message' => 'Event open date has set successfully']);
    }

    public function CloseElection(Request $request, $event)
    {

        $events = Event::find($event);

        if (!$events) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        $events->close_election_at = now();
        $events->save();

        return response()->json(['message' => 'Event close date has set successfully']);
    }

    public function deleteEvent($event)
    {
        $event = Event::find($event);

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        $event->delete();

        return response()->json(['message' => 'Event deleted successfully']);
    }
}
