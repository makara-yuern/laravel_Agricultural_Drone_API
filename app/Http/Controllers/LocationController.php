<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $location = Location::all();
        return response()->json(['success' => true, 'data' => $location], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $location = Location::create([
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'altitude' => $request->input('altitude'),
        ]);
        return response()->json(['success' => true, 'data' => $location], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $location = Location::find($id);
        return response()->json(['success' => true, 'data' => $location], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $location = Location::find($id);
        $location->update([
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'altitude' => $request->input('altitude'),
        ]);
        return response()->json(['success' => true, 'data' => $location], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $location = Location::find($id);
        $location->delete();
        return response()->json(['success' => true, 'message' => "delete successfully"], 200);
    }
}
