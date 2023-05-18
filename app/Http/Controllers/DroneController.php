<?php

namespace App\Http\Controllers;

use App\Models\Battery;
use App\Models\Drone;
use Illuminate\Http\Request;

class DroneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drones = Drone::all();
        return response()->json(['success' => true, 'data' => $drones], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $drones = Drone::create(
            [
                'droneTypes' => request('droneTypes'),
                'modelNumber' => request('modelNumber'),
                'manufacturer' => request('manufacturer'),
                'size' => request('size'),
                'time' => request('time'),
                'purpose' => request('purpose'),
                'farmer_id' => request('farmer_id'),
                'user_id' => request('user_id'),
            ]
            );
            return response()->json(['success' => true, 'data' => $drones], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $drones = Drone::find($id);
        return response()->json(['success' =>true, 'data' => $drones],200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $drones = Drone::find($id);
        $drones->update(
            [
                'droneTypes' => request('droneTypes'),
                'modelNumber' => request('modelNumber'),
                'manufacturer' => request('manufacturer'),
                'size' => request('size'),
                'time' => request('time'),
                'purpose' => request('purpose'),
            ]
            );
            return response()->json(['success' =>true, 'data' => $drones], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $drones = Drone::find($id);
        $drones->delete();
        return response()->json(['success' =>true, 'message'=>'delete successfully'], 200);
    }
}