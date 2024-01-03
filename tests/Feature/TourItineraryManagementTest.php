<?php

use App\Models\Tour;

uses()->group('tour_itineraries');

beforeEach(function(){
    $user_info = ['email'=>'user@example.com','password'=>'password'];
    $response = $this->post(route('post_login'), $user_info);
    $this->access_token = $response->json('access_token');
    $this->tour = Tour::first();
    $this->day = $this->tour->itineraryDays()->first();
});

it('tests admin can list itineraries to the tours', function () {

    $response = $this->withHeaders(['Authorization' => 'Bearer '. $this->access_token, 'Accept' => 'application/json'])->get(route('tour.day.itinerary.index',[ 'tour' => $this->tour,'day'=>$this->day]));
    $response->assertOk();
    $response->assertJsonStructure(['data']);
});

it('tests admin can add itineraries to the tour days', function () {
    $itinerary_info = ['begin'=>'18:00','end'=>"19:00",'name'=>'sight seeing','description'=>'see in the ocean','type'=>'boating activity'];
    $response = $this->withHeaders(['Authorization' => 'Bearer '. $this->access_token, 'Accept' => 'application/json'])->post(route('tour.day.itinerary.store',[ 'tour' => $this->tour,'day'=>$this->day]),$itinerary_info);
    $response->assertCreated();
    $this->assertDatabaseHas('tour_itineraries', $itinerary_info + ['tour_id'=>$this->tour->id,'day_id'=>$this->day->id]);

});

it('tests admin can view specific itineraries to the tours days', function () {
    $itinerary = $this->day->itineraries()->first();
    $response = $this->withHeaders(['Authorization' => 'Bearer '. $this->access_token, 'Accept' => 'application/json'])->get(route('tour.day.itinerary.show',[ 'tour' => $this->tour,'day'=>$this->day,'itinerary'=>$itinerary]));
    $response->assertOk();
});

it('tests admin can edit itineraries to days of the tours', function () {
    $itinerary = $this->day->itineraries()->first();
    $itinerary_info = ['begin'=>'06:00','end'=>"07:00",'name'=>'sight seeing','description'=>'see in the ocean','type'=>'boating activity'];
    $response = $this->withHeaders(['Authorization' => 'Bearer '. $this->access_token, 'Accept' => 'application/json'])->put(route('tour.day.itinerary.update',['tour' => $this->tour,'day'=>$this->day,'itinerary'=>$itinerary]),$itinerary_info);
    $response->assertOk();
    $response->assertJson(['message' => 'itinerary updated successfully.']);
    $this->assertDatabaseHas('tour_itineraries', $itinerary_info + ['tour_id'=>$this->tour->id,'day_id'=>$this->day->id]);
});


it('test admin can delete specific itineraries of days of the tours', function(){
    $itinerary = $this->day->itineraries()->first();
    $response = $this->withHeaders(['Authorization' => 'Bearer '. $this->access_token, 'Accept' => 'application/json'])->delete(route('tour.day.itinerary.destroy',['tour' => $this->tour,'day'=>$this->day,'itinerary'=>$itinerary]));
    $response->assertGone();
    $response->assertJson(['message' => 'itinerary deleted successfully.']);
});


