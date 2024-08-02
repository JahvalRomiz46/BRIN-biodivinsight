<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Soil;

class SoilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }



    public function store(Request $request, string $observationId)
    {
        $existingSoil = Soil::where('observation_id', $observationId)->first();
        if ($existingSoil) {
            return response()->json(['error' => 'A Soil record already exists for this observation.'], 400);
        }

        $request->validate([
            'moisture' => 'required',
            'pH' => 'required',
            'temperature' => 'required',
        ]);

        Soil::create([
            'observation_id' => $observationId,
            'moisture' => $request->moisture,
            'pH' => $request->pH,
            'temperature' => $request->temperature,
        ]);

        return response()->json(['success' => 'Soil created successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'moisture' => 'required',
            'pH' => 'required',
            'temperature' => 'required',
        ]);

        $soil = Soil::findOrFail($id);
        $soil->update($request->all());


        return response()->json(['success' => 'Soil updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $soil = Soil::findOrFail($id);
        $soil->delete();

        return response()->json(['success' => 'Soil deleted successfully.']);
    }
}
