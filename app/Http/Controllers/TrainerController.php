<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainer = Trainer::all();
        return response()->json($trainer);
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
        'Age' => 'required|integer|min:1|max:999',
        'Height' => 'required|integer|min:1|max:250',
        'Weight' => 'required|integer|min:1|max:360',
        'CPF' => 'required|integer|max:99999999999',
        'RG' => 'required|integer|max:999999999'
        ]);

        try{
            $trainer = Trainer::create($validated);

            return response()->json([
                'message' => 'Trainer created successfully',
                'trainer' => $trainer
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed to create trainer',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Trainer $trainer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trainer $trainer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trainer $trainer)
    {
        $validated = $request->validate([
        'Name' => 'sometimes|required|string|max:255',
        'Age' => 'sometimes|required|integer|min:1|max:999',
        'Height' => 'sometimes|required|integer|min:1|max:250',
        'Weight' => 'sometimes|required|integer|min:1|max:360',
        'CPF' => 'sometimes|required|integer|max:99999999999',
        'RG' => 'sometimes|required|integer|max:999999999'
        ]);

        try {
            $trainer->update($validated);

            return response()->json([
                'message' => 'Trainer updated successfully',
                'trainer' => $trainer            
                ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed to update trainer',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trainer $trainer)
    {
        try {
            $trainer->delete();

            return response()->json([
                'message' => 'Trainer deleted successfully'
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed to delete trainer',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
