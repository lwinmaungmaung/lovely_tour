<?php

use App\Models\Tour;
use App\Models\User;

uses()->group('tour');

beforeEach(function(){
    $user_info = ['email'=>'user@example.com','password'=>'password'];
    $response = $this->post(route('post_login'), $user_info);
    $this->access_token = $response->json('access_token');
});

it('tests admin can view tours', function () {
    $response = $this->withHeaders(['Authorization' => 'Bearer '. $this->access_token, 'Accept' => 'application/json'])->get(route('tour.index'));
    $response->assertOk();
    $response->assertJsonStructure(['data']);
});

it('tests user can create a new tour', function () {
    $tour_info = ['name' => 'tourname', 'description' => 'tour_description', 'price_per_pax'=>2000,'min_pax_booking'=>2];
    $response = $this->withHeaders(['Authorization' => 'Bearer ' . $this->access_token, 'Accept' => 'application/json'])->post(route('tour.store'), $tour_info);
    $response->assertCreated();
    $response->assertJson(['message' => 'tour created successfully.']);
    $this->assertDatabaseHas('tours',$tour_info);

});

it('can view the specified tour', function () {
    $tour = Tour::latest()->get()->first();
    $response = $this->withHeaders(['Authorization' => 'Bearer ' . $this->access_token, 'Accept' => 'application/json'])->get(route('tour.show', ['tour' => $tour]));
    $response->assertOk();
    $response->assertJsonStructure(["data" => ['name', 'description', 'image', 'price_per_pax','min_pax_booking']]);
});

it('can update the specified tour', function () {
    $selected_tour = Tour::latest()->get()->first();
    $tour_info = ['name' => 'Tour to Hongkong', 'description' => 'Hongkong is one of the most beautiful land with landscapes', 'price_per_pax'=>2000,'min_pax_booking'=>2];
    $response = $this->withHeaders(['Authorization' => 'Bearer ' . $this->access_token, 'Accept' => 'application/json'])->put(route('tour.update', ['tour' => $selected_tour]), $tour_info);
    $response->assertOk();
    $response->assertJson(['message' => 'tour updated successfully.']);
    $this->assertDatabaseHas('tours',$tour_info);
});

it('can delete the specified tour', function () {
    $selected_tour = Tour::latest()->get()->first();
    $response = $this->withHeaders(['Authorization' => 'Bearer ' . $this->access_token, 'Accept' => 'application/json'])->delete(route('tour.destroy', ['tour' => $selected_tour]));
    $response->assertStatus(410);
    $response->assertJson(['message' => 'tour removed successfully.']);
});
