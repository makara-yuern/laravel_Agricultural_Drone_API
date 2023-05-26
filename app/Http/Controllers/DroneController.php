<?php

namespace App\Http\Controllers;

use App\Http\Requests\DroneRequest;
use App\Http\Resources\DroneResource;
use App\Http\Resources\InstructionResource;
use App\Http\Resources\ShowDroneLocationResource;
use App\Models\Battery;
use App\Models\Drone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DroneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drones = Drone::all();
        $drones = DroneResource::collection($drones);
        return response()->json(['success' => true, 'data' => $drones], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DroneRequest $request)
    {
        $drones = Drone::store($request);
        return response()->json(['success' => true, 'data' => $drones], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Drone::where('drones_id', $id)->first();

        if (!$data) {
            return response('Data not found', 404);
        }
        $drones = new DroneResource($data);
        return response()->json(['success' => true, 'data' => $drones], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DroneRequest $request, string $id)
    {
        $drones = Drone::store($request, $id);
        return response()->json(['success' => true, 'data' => $drones], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $drones = Drone::find($id);
        $drones->delete();
        return response()->json(['success' => true, 'message' => 'delete successfully'], 200);
    }

    // -------------------------get location of drone by ID---------------------------------------
    public function getDroneLocation(string $id)
    {
        $data = Drone::where('drones_id', $id)->first();

        if (!$data) {
            return response('Data not found', 404);
        }
        $drones = new ShowDroneLocationResource($data);
        return response()->json(['success' => true, 'data' => $drones], 200);
    }

    public function getInstruction()
    {
        // dd(1);
        $drone = Drone::all();
        $drone = InstructionResource::collection($drone);
        
        return response()->json(['success' => true, 'data' => $drone], 200);
    }
}
