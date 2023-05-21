<?php

namespace App\Http\Controllers;

use App\Http\Requests\FarmerRequest;
use App\Http\Requests\FarmRequest;
use App\Http\Resources\FarmerResource;
use App\Http\Resources\FarmResource;
use App\Models\Farmer;
use Illuminate\Http\Request;

class FarmerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $farmers = Farmer::all();
        $farmers = FarmerResource::collection($farmers);
        return response()->json(['success' => true, 'data' => $farmers], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FarmerRequest $request)
    {
        $farmers = Farmer::store($request);
        return response()->json(['success' => true, 'data' => $farmers], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $farmers = Farmer::find($id);
        $farmers = new FarmerResource($farmers);
        return response()->json(['success' =>true, 'data' => $farmers],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FarmerRequest $request, string $id)
    {
        $farmers = Farmer::store($request, $id);
        return response()->json(['success' =>true, 'data' => $farmers], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $farmers = Farmer::find($id);
        $farmers->delete();
        return response()->json(['success' =>true, 'message'=>'delete successfully'], 200);
    }
}

