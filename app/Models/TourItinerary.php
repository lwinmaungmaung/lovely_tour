<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourItinerary extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_id',
        'day_id',
        'begin',
        'end',
        'name',
        'description',
        'type',
        'additional_information',
    ];

    public function tour(){
        return $this->belongsTo(Tour::class, 'tour_id', 'id');
    }
    public function itineraryDay(){
        return $this->belongsTo(TourItineraryDay::class, 'day_id', 'id');
    }
}
