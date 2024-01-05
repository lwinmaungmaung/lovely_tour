<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'tour_id',
        'adult',
        'children',
        'special_instruction',
    ];
    public function customer(){
        $this->hasOne(Customer::class, 'customer_id', 'id');
    }
}
