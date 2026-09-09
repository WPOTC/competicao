<?php

namespace App\Http\Controllers;

use App\Models\Modality;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ModalityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modality = Modality::all();
        return response()->json($modality);
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
        'Name' => 'required|string|max:255',
        'Description' => 'required|string|max:255'
        ]);

        try {
            $modality = Modality::create($validated);

            return response()->json([
                'message' => 'Modality created successfully',
                'modality' => $modality
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed to create modality',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Modality $modality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modality $modality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modality $modality)
    {
        $validated = $request->validate([
        'Name' => 'sometimes|required|string|max:255',
        'Description' => 'sometimes|required|string|max:255'
        ]);

        try {
            $modality->update($validated);

            return response()->json([
                'message' => 'Modality updated successfully',
                'modality' => $modality
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed to update modality',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modality $modality)
    {
        try {
            $modality->delete();

            return response()->json([
                'message' => 'Modality deleted successfully'
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed to delete modality',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
