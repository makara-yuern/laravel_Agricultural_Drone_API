<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Http\Resources\ImageResource;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $image = Image::all();
        $image = ImageResource::collection($image);
        return response()->json(['success' => true, 'data' => $image], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ImageRequest $request)
    {
        $image = Image::store($request);
        return response()->json(['success' => true, 'data' => $image], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $image = Image::find($id);
        $image = new ImageResource($image);
        return response()->json(['success' => true, 'data' => $image], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ImageRequest $request, string $id)
    {
        $image = Image::store($request, $id);
        return response()->json(['success' => true, 'data' => $image], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = Image::find($id);
        $image->delete();
        return response()->json(['success' => true, 'data' => $image], 200);
    }
}
