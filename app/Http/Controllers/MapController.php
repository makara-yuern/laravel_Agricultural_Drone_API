<?php

namespace App\Http\Controllers;

use App\Models\Map;
use Illuminate\Http\Request;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $map = Map::all();
        return response()->json(['success' => true, 'data' => $map], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $map = Map::create([
            'place' => $request->input('place'),
            'dron_id' => $request->input('dron_id'),
        ]);
        return response()->json(['success' => true, 'data' => $map], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $map = Map::find($id);
        return response()->json(['success' => true, 'data' => $map], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $map = Map::find($id);
        $map->update([
            'place' => $request->input('place'),
            'dron_id' => $request->input('dron_id'),
        ]);
        return response()->json(['success' => true, 'data' => $map], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $map = Map::find($id);
        $map->delete();
        return response()->json(['success' => true, 'message' => "delete successfully"], 200);
    }
}
