<?php

namespace App\Http\Controllers;

use App\Http\Requests\BatteryRequest;
use App\Http\Resources\BatteryResource;
use App\Models\Battery;
use Illuminate\Http\Request;

class BatteryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $battery = Battery::all();
        $batteries = BatteryResource::collection($battery);
        return response()->json(['success' => true, 'data' => $batteries], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BatteryRequest $request)
    {
<<<<<<< HEAD
        $batteries = Battery::store($request);
        return response()->json(['success' => true, 'data' => $batteries], 201);
=======
        $batterys = Battery::create(
            [
                'currentBatteries' => request('currentBatteries'),
                'capacity' => request('capacity'),
                'dron_id' => request('dron_id'),
            ]
        );
        return response()->json(['success' => true, 'data' => $batterys], 201);
>>>>>>> 3e9a8d02b861ccadb07c57547548fe672bb714d4
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $battery = Battery::find($id);
        $batteries = new BatteryResource($battery);
        return response()->json(['success' =>true, 'data' => $batteries],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BatteryRequest $request, string $id)
    {
        $batteries = Battery::store($request, $id);
        return response()->json(['success' =>true, 'data' => $batteries], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $batterys = Battery::find($id);
        $batterys->delete();
        return response()->json(['success' =>true, 'message'=>'delete successfully'], 200);
    }
}
