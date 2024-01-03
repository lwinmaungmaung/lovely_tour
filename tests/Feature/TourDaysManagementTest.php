<?php

use App\Models\Tour;

uses()->group('tour_days');

beforeEach(function(){
    $user_info = ['email'=>'user@example.com','password'=>'password'];
    $response = $this->post(route('post_login'), $user_info);
    $this->access_token = $response->json('access_token');
});

it('tests admin can list days to the tours', function () {
    $tour = Tour::first();
    $response = $this->withHeaders(['Authorization' => 'Bearer '. $this->access_token, 'Accept' => 'application/json'])->get(route('tour.day.index',[ 'tour' => $tour]));
    $response->assertOk();
    $response->assertJsonStructure(['data']);
});

it('tests admin can add days to the tours', function () {
    $tour = Tour::first();
    $day_info = ['header' => 'Day 1 : The beginning'];
    $response = $this->withHeaders(['Authorization' => 'Bearer '. $this->access_token, 'Accept' => 'application/json'])->post(route('tour.day.store',['tour' => $tour]),$day_info);
    $response->assertCreated();
    $this->assertDatabaseHas('tour_itinerary_days', $day_info + ['tour_id'=>$tour->id]);
});

it('tests admin can view days to the tours', function () {
    $tour = Tour::first();
    $day = $tour->itineraryDays()->first();
    $response = $this->withHeaders(['Authorization' => 'Bearer '. $this->access_token, 'Accept' => 'application/json'])->get(route('tour.day.show',['tour' => $tour,'day'=>$day]));
    $response->assertOk();
});

it('tests admin can edit days to the tours', function () {
    $tour = Tour::first();
    $day = $tour->itineraryDays()->latest()->get()->first();
    $day_info = ['header' => 'Day final : The end'];
    $response = $this->withHeaders(['Authorization' => 'Bearer '. $this->access_token, 'Accept' => 'application/json'])->put(route('tour.day.update',['tour' => $tour,'day'=>$day]),$day_info);
    $response->assertOk();
    $response->assertJson(['message' => 'tour itinerary day updated successfully.']);
    $this->assertDatabaseHas('tour_itinerary_days', $day_info + ['tour_id'=>$tour->id]);
});

it('test admin can delete days to the tours', function(){
    $tour = Tour::first();
    $day = $tour->itineraryDays()->latest()->get()->first();
    $response = $this->withHeaders(['Authorization' => 'Bearer '. $this->access_token, 'Accept' => 'application/json'])->delete(route('tour.day.destroy',['tour' => $tour,'day'=>$day]));
    $response->assertGone();
    $response->assertJson(['message' => 'tour itinerary day deleted successfully.']);
});


