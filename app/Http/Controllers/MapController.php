<?php

namespace App\Http\Controllers;

use App\Http\Requests\MapRequest;
use App\Http\Resources\MapResource;
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
        $map = MapResource::collection($map);
        return response()->json(['success' => true, 'data' => $map], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MapRequest $request)
    {
        $map = Map::store($request);
        return response()->json(['success' => true, 'data' => $map], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $map = Map::find($id);
        $map = new MapResource($map);
        return response()->json(['success' => true, 'data' => $map], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MapRequest $request, string $id)
    {
        $map = Map::store($request, $id);
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