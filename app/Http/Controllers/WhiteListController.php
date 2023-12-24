<?php

namespace App\Http\Controllers;

use App\Models\WhiteList;
use Illuminate\Http\Request;

class WhiteListController extends Controller
{
    public function index($event)
    {
        $whitelist = WhiteList::where('event_id', $event)->get();
        return response()->json($whitelist);
    }

    public function store(Request $request, $event)
    {
        $whitelist = WhiteList::where('event_id', $event)->delete();

        foreach ($request->whitelists as $key => $val) {
            $whitelist = new WhiteList();
            $whitelist->event_id = $event;
            $whitelist->npm = $val;
            $whitelist->save();
        }

        return response()->json(['message' => 'whitelists created successfully!']);
    }
}
