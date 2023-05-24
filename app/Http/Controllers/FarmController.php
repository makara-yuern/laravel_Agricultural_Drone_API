<?php

namespace App\Http\Controllers;

use App\Http\Requests\FarmRequest;
use App\Http\Resources\FarmMapResource;
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
        $farms = FarmResource::collection($farms);
        return response()->json(['success' => true, 'data' => $farms], 200);
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

    public function getImageFarmInKC(string $name, $id)
    {
        // // $id = 7;
        // // dd(Map::where('area', $name)->where('id', $id)->first());
        // // dd($id);
        // $data = Map::where('area', $name)->where('id', $id)->first();

        // // dd($data);
        // if (!$data) {
        //     return response('Data not found', 404);
        // }
        // $drones = new FarmMapResource($data);
        // // dd($drones);
        $data = Map::with('farms')
            ->where('area', $name)
            ->whereHas('farms', function ($query) use ($id) {
                $query->where('id', $id);
            })
            ->first();

        $response = [
            'farm_id' => $data->farm->id,
            'map_area' => $data->area,
        ];

        return response()->json($response);

        // $drones = new FarmMapResource($data);
        // return response()->json(['success' => true, 'download image' => $drones], 200);
    }

    public function getData($name, $id)
    {
        $farmId = ($data = Farm::where('id', $id)->first());
        $map = ($data = Map::where('area', $name)->first());
        
        if($farmId){
            if($map){
                return response()->json(["image"=>$map->images], 200);
            }
            return response()->json(["message"=> "image not found!"], 404);
        }

    }
}