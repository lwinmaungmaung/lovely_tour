<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourItineraryDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_id',
        'header',
        'position',
    ];

    public function tour(){
        return $this->belongsTo(Tour::class, 'id', 'tour_id');
    }
    public function itineraries(){
        return $this->hasMany(TourItinerary::class, 'day_id', 'id');
    }
}
