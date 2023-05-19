<?php

namespace App\Http\Controllers;

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
        return response()->json(['success' => true, 'data' => $image], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = Image::create([
            'type' => $request->input('type'),
            'date' => $request->input('date'),
            'area' => $request->input('area'),
            'dron_id' => $request->input('dron_id'),
        ]);
        return response()->json(['success' => true, 'data' => $image], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $image = Image::find($id);
        return response()->json(['success' => true, 'data' => $image], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $image = Image::find($id);
        $image->update([
            'type' => $request->input('type'),
            'date' => $request->input('date'),
            'area' => $request->input('aarea'),
            'dron_id' => $request->input('dron_id'),
        ]);
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
