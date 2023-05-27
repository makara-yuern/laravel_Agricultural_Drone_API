<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstructionRequest;
use App\Http\Requests\StoreInstructionRequest;
use App\Http\Resources\InstructionResource;
use App\Models\Drone;
use App\Models\Instruction;
use Illuminate\Http\Request;

class InstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instruction = Instruction::all();
        $instruction = InstructionResource::collection($instruction);
        return response()->json(['success' => true, 'data' => $instruction], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InstructionRequest $request)
    {
        $instructions = Instruction::store($request);
        return response()->json(['success' => true, 'data' => $instructions], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $instruction = Instruction::find($id);
        $instructions = new InstructionResource($instruction);
        return response()->json(['success' =>true, 'data' => $instructions],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreInstructionRequest $request, $droneId, $id)
    {
        $data = Drone::where('drones_id', $droneId)->first();
        // dd($data);
        if($data){
            $instruction = Instruction::store($request, $id);
            return response()->json(['success' =>true, 'data' => $instruction], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $instruction = Instruction::find($id);
        $instruction->delete();
        return response()->json(['success' =>true, 'message'=>'delete successfully'], 200);
    }
}
