<?php

uses()->group('login');

beforeEach(function () {
    $this->user_info = ['name'=> 'user','email'=>'user@example.com','password'=>'password'];
    $this->user = \App\Models\User::firstOrCreate(['email' => $this->user_info['email']], $this->user_info);
    $auth_data = $this->post(route('post_login'), $this->user_info);
    $this->access_token = $auth_data->json('access_token');
});

it('tests the app can do login',function(){
    $response = $this->post(route('post_login'),$this->user_info);
    $response->assertOk();
});

it('see the data on authenticated page', function () {
    $response = $this->withHeaders(['Authorization' => 'Bearer '. $this->access_token, 'Accept' => 'application/json'])->get(route('user'));
    $response->assertOk();
});
