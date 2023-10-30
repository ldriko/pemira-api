<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $request = request();

        // Get the raw data from the request
        // $raw_data = $request->raw();
        // $raw_data = $request->all();
        // $request = request()->all();
        // dd($request->input());

        // Return the raw data
        // return response()->json($request);
        // dd($request);
        // return response()->json($request);
        // return response()->json([
        //     'status' => '1',
        //     'data' => [
        //         'ok'
        //     ]
        // ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
