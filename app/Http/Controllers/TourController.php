<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreToursRequest;
use App\Http\Requests\UpdateToursRequest;
use App\Http\Resources\TourResource;
use App\Models\Tour;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TourResource::collection(Tour::paginate());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreToursRequest $request)
    {
        Tour::create($request->validated());
        return response()->json(['message' => 'tour created successfully.'],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tour $tour)
    {
        return new TourResource($tour);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateToursRequest $request, Tour $tour)
    {
        $tour->update($request->validated());
        return response()->json(['message' => 'tour updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour)
    {
        $tour->delete();
        return response()->json(['message' => 'tour removed successfully.'],410);
    }
}
