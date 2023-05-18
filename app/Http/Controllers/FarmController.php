<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use Illuminate\Http\Request;

class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $farms = Farm::all();
        return response()->json(['success' => true, 'data' => $farms], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $farms = Farm::create(
            [
                'name' => request('name'),
                'address' => request('address'),
                'farmer_id' => request('farmer_id'),
            ]
        );
            return response()->json(['success' => true, 'data' => $farms], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $farms = Farm::find($id);
        return response()->json(['success' =>true, 'data' => $farms],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $farms = Farm::find($id);
        $farms->update(
            [
                'name' => request('name'),
                'address' => request('address'),
            ]
        );
        return response()->json(['success' =>true, 'data' => $farms], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $farms = Farm::find($id);
        $farms->delete();
        return response()->json(['success' =>true, 'message'=>'delete successfully'], 200);
    }
}
