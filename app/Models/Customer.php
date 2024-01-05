<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'name',
        'email',
        'mobile',
    ];

    public function Bookings(){
        return $this->hasMany(Booking::class, 'customer_id', 'id');
    }
}
