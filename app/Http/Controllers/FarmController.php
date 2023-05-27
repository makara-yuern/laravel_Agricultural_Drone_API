<?php

namespace App\Http\Controllers;

use App\Http\Requests\FarmRequest;
use App\Http\Resources\FarmResource;
use App\Models\Farm;
use App\Models\Map;

class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $farms = Farm::all();
        $farm = FarmResource::collection($farms);
        return response()->json(['success' => true, 'data' => $farm], 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FarmRequest $request)
    {
        $farms = Farm::store($request);
        return response()->json(['success' => true, 'data' => $farms], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $farms = Farm::find($id);
        $farms = new FarmResource($farms);
        return response()->json(['success' => true, 'data' => $farms], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FarmRequest $request, string $id)
    {
        $farms = Farm::store($request, $id);
        return response()->json(['success' => true, 'data' => $farms], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $farms = Farm::find($id);
        $farms->delete();
        return response()->json(['success' => true, 'message' => 'delete successfully'], 200);
    }

    public function downloagImage($name, $id)
    {
        $farmId = Farm::where('id', $id)->first();
        $map = Map::where('area', $name)->first();

        if ($map) {
            if ($farmId) {
                return response()->json(["image" => $map->images], 200);
            } else {
                return response()->json(["message" => "image not found!"], 404);
            }
        }
    }
}