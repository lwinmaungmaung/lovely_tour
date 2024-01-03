<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerBookingRequest;
use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function book(CustomerBookingRequest $request){
        $customer_info = $request->safe()->only(['title','name','email','phone']);
        $booking_info = $request->safe()->only(['tour_id','adult','children','special_instruction']);
        $customer = Customer::updateOrCreate(['email' => $customer_info['email']], $customer_info);
        if($customer){
            Booking::create($booking_info + ['customer_id' => $customer->id]);
        }
        return response()->json(['status'=>'success','message'=>'booking completed.']);
    }
}
