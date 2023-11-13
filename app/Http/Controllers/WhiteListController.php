<?php

namespace App\Http\Controllers;

use App\Models\WhiteList;
use Illuminate\Http\Request;

class WhiteListController extends Controller
{
    public function show($id)
    {
        $divisions = WhiteList::where('event_id', $id)->get();
        return response()->json($divisions);
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'npm' => 'required|string|max:255',
        ]);

        $whitelist = new WhiteList();
        $whitelist->event_id = $id;
        $whitelist->npm = $request->input('npm');
        $whitelist->save(); 

        return response()->json(['message' => 'whitelist user created successfully']);
    }
    
    public function delete($id)
    {
        $event = WhiteList::find($id);

        if (!$event) {
            return response()->json(['message' => 'whitelist user user not found'], 404);
        }

        $event->delete();

        return response()->json(['message' => 'whitelist user deleted successfully']);
    }
}
