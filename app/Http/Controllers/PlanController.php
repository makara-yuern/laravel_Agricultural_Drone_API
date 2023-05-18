<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plan = Plan::all();
        return response()->json(['success' => true, 'data' => $plan], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $plan = Plan::create([
            'planTypes' => $request->input('planTypes'),
            'location' => $request->input('location'),
            'cropTypes' => $request->input('cropTypes'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
        ]);
        return response()->json(['success' => true, 'data' => $plan], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $plan = Plan::find($id);
        return response()->json(['success' => true, 'data' => $plan], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $plan = Plan::find($id);
        $plan->update([
            'planTypes' => $request->input('planTypes'),
            'location' => $request->input('location'),
            'cropTypes' => $request->input('cropTypes'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
        ]);
        return response()->json(['success' => true, 'data' => $plan], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plan = Plan::find($id);
        $plan->delete();
        return response()->json(['success' => true, 'message' => "delete successfully"], 200);
    }
}
