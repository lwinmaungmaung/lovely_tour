<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTourItineraryDaysRequest;
use App\Http\Requests\UpdateTourItineraryDaysRequest;
use App\Http\Resources\TourDaysResource;
use App\Http\Resources\TourResource;
use App\Models\Tour;
use App\Models\TourItineraryDay;

class TourItineraryDayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Tour $tour)
    {
        $tourdays = $tour->itineraryDays;
        return TourDaysResource::collection($tourdays);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTourItineraryDaysRequest $request,Tour $tour)
    {
        $tour->itineraryDays()->create($request->validated());
        return response()->json(['message' => 'tour day created successfully.'],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tour $tour, TourItineraryDay $day)
    {
        return new TourDaysResource($day);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTourItineraryDaysRequest $request, Tour $tour , TourItineraryDay $day)
    {
        $day->update($request->validated());
        return response()->json(['message' => 'tour itinerary day updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour, TourItineraryDay $day)
    {
        $day->delete();
        return response()->json(['message' => 'tour itinerary day deleted successfully.'],410);
    }
}
