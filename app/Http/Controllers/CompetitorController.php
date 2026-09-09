<?php

namespace App\Http\Controllers;

use App\Models\Competitor;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class CompetitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competitor = Competitor::all();
        return response()->json($competitor);
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
        'Gender' => 'required|string|max:255',
        'CPF' => 'required|integer|max:99999999999',
        'RG' => 'required|integer|max:999999999',
        'Team' => 'required|string|max:255'
        ]);

        try {
            $competitor = Competitor::create($validated);
            return response()->json([
                'message' => 'Competitor created successfully',
                'competitor' => $competitor
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed to create competitor',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Competitor $competitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Competitor $competitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Competitor $competitor)
    {
        $validated = $request->validate([
        'Name' => 'sometimes|required|string|max:255',
        'Age' => 'sometimes|required|integer|min:1|max:999',
        'Height' => 'sometimes|required|integer|min:1|max:250',
        'Weight' => 'sometimes|required|integer|min:1|max:360',
        'Gender' => 'sometimes|required|string|max:255',
        'CPF' => 'sometimes|required|integer|max:99999999999',
        'RG' => 'sometimes|required|integer|max:999999999',
        'Team' => 'sometimes|required|string|max:255'
        ]);

        try {
            $competitor->update($validated);

            return response()->json([
                'message' => 'Competitor updated successfully',
                'competitor' => $competitor
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed to update competitor',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competitor $competitor)
    {
        try {
            $competitor->delete();

            return response()->json([
                'message' => 'Competitor deleted successfully'
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed to delete competitor',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
