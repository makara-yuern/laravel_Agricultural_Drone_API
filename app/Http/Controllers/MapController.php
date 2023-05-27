<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateImageRequest;
use App\Http\Requests\MapRequest;
use App\Http\Resources\MapResource;
use App\Models\Farm;
use App\Models\Map;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

//  destroy Images
    public function getDeleteImage($provinceName, $farmId)
    {
        $province = Map::where('area', $provinceName)->first();
        $farms = $province->farm->where('id', $farmId)->first();
        if($province){
            if($farms){
                if ($province->farm == null) {
                    return response()->json(['Message' => 'Farm number ' . $farmId . ' in ' . $provinceName . " don't have any data to delete", 'status' => 200]);
                }
                else {
                    $images = json_decode($province->images);
                    $image = $province->images;
                    $imageUrl = $image;
                    // dd($imageUrl);
                    if ($images === null) {
                        $images = [];
                    }
                    $imageName = basename($imageUrl); // replace $imageUrl with the actual URL of the image
                    $images = array_diff($images, [$imageName]);
                    Storage::disk('public')->delete($imageName);
                    $province->images = json_encode(array_values($images));
                    $province->save();
                    return response()->json(['message' => 'Completely delete the images from' . $provinceName . ' in farm number ' . $farmId, 'status' => 200]);
                }
            }
        }
    }
    public function storeImage($area, $farm_id)
    {
        $province = Map::where('area', $area)->first();
        $farms = $province->farm->where('id', $farm_id)->first();

        if ($province) {
            if ($farms) {
                $province->update(
                    ['images' => request('images')]
                );
                return 'create successfully!';
            }
        }

    }
}
