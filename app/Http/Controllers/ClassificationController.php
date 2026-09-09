<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
//Nós temos que importar esse QueryException para poder capturar a exceção de falha na criação do registro no banco de dados.

class ClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classification = Classification::all();
        return response()->json($classification);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Position' => 'required|integer|min:1|max:100',
            'Competitor_name' => 'required|string|max:255',
            'Trainer_name' => 'required|string|max:255'
        ]);

        try {
            $classification = Classification::create($validated);
            return response()->json([
                'message' => 'Classification created successfully',
                'classification' => $classification
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed to create classification',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Classification $classification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classification $classification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classification $classification)
    {
        $validated = $request->validate([
            'Position' => 'sometimes|required|integer|min:1|max:100',
            'Competitor_name' => 'sometimes|required|string|max:255',
            'Trainer_name' => 'sometimes|required|string|max:255'
        ]);

        try {
            $classification->update($validated);

            return response()->json([
                'message' => 'Classification updated successfully',
                'classification' => $classification
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed to update classification',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classification $classification)
    {
        try {
            $classification->delete();

            return response()->json([
                'message' => 'Classification deleted successfully'
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed to delete classfication',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
