<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTourItinerariesRequest;
use App\Http\Requests\UpdateTourItinerariesRequest;
use App\Http\Resources\TourItineraryResource;
use App\Models\Tour;
use App\Models\TourItinerary;
use App\Models\TourItineraryDay;

class TourItineraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Tour $tour, TourItineraryDay $day)
    {
        $itineraries = $day->itineraries;
        return TourItineraryResource::collection($itineraries);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTourItinerariesRequest $request,Tour $tour, TourItineraryDay $day)
    {
        TourItinerary::create($request->validated() + ['tour_id' => $tour->id, 'day_id' => $day->id]);
        return response()->json(['message' => 'itinerary created successfully.'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tour $tour, TourItineraryDay $day, TourItinerary $itinerary)
    {
        return new TourItineraryResource($itinerary);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTourItinerariesRequest $request, Tour $tour, TourItineraryDay $day,TourItinerary $itinerary)
    {
        $itinerary->update($request->validated());
        return response()->json(['message' => 'itinerary updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour, TourItineraryDay $day, TourItinerary $itinerary)
    {
        $itinerary->delete();
        return response()->json(['message' => 'itinerary deleted successfully.'], 410);
    }
}
