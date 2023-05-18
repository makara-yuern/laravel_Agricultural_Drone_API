<?php

namespace App\Http\Controllers;

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
        return response()->json(['success' => true, 'data' => $farmers], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $farmers = Farmer::create(
            [
                'name' => request('name'),
                'age' => request('age'),
                'email' => request('email'),
                'password' => request('password'),
            ]
            );
            return response()->json(['success' => true, 'data' => $farmers], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $farmers = Farmer::find($id);
        return response()->json(['success' =>true, 'data' => $farmers],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $farmers = Farmer::find($id);
        $farmers->update(
            [
                'name' => request('name'),
                'age' => request('age'),
                'email' => request('email'),
                'password' => request('password'),
            ]
            );
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

