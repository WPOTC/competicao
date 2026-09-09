<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $location = Location::all();
        return response()->json($location);
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
        'Street' => 'required|string|max:255',
        'Neighborhood' => 'required|string|max:255',
        'Number' => 'required|integer|min:1|max:9999',
        'CEP' => 'required|integer|max:99999999',
        'City' => 'required|string|max:255',
        'State' => 'required|string|max:255',
        'Country' => 'required|string|max:255'
        ]);

        try {
            $location = Location::create($validated);

            return response()->json([
                'message' => 'Location created successfully',
                'location' => $location 
            ], 201); 
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed to create location',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        $validated = $request->validate([
        'Street' => 'sometimes|required|string|max:255',
        'Neighborhood' => 'sometimes|required|string|max:255',
        'Number' => 'sometimes|required|integer|min:1|max:9999',
        'CEP' => 'sometimes|required|integer|max:99999999',
        'City' => 'sometimes|required|string|max:255',
        'State' => 'sometimes|required|string|max:255',
        'Country' => 'sometimes|required|string|max:255'
        ]);

        try {
            $location->update($validated);
            return response()->json([
                'message' => 'Location updated successfully',
                'location' => $location
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed to update location',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        try {
            $location->delete();

            return response()->json([
                'message' =>'Location deleted successfully'
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed to delete location',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
