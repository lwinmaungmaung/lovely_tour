<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'price_per_pax',
        'min_pax_booking',
    ];

    public function itineraryDays(){
        return $this->hasMany(TourItineraryDay::class, 'tour_id', 'id');
    }
    public function itineraries(){
        return $this->hasMany(TourItinerary::class, 'tour_id', 'id');
    }
}
