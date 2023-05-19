<?php

namespace App\Http\Controllers;

use App\Models\Battery;
use Illuminate\Http\Request;

class BatteryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batterys = Battery::all();
        return response()->json(['success' => true, 'data' => $batterys], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $batterys = Battery::create(
            [
                'currentBatteries' => request('currentBatteries'),
                'capacity' => request('capacity'),
                'dron_id' => request('dron_id'),
            ]
        );
        return response()->json(['success' => true, 'data' => $batterys], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $batterys = Battery::find($id);
        return response()->json(['success' =>true, 'data' => $batterys],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $batterys = Battery::find($id);
        $batterys -> update(
            [
                'currentBatteries' => request('currentBatteries'),
                'capacity' => request('capacity'),
            ]
            );
            return response()->json(['success' =>true, 'data' => $batterys], 200);
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
