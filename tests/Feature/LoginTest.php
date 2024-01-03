<?php

use App\Models\User;

uses()->group('login');



it('tests the app can do login',function(){
    $user_info = ['name'=> 'user','email'=>'user@example.com','password'=>'password','user_level'=>'admin'];
    User::firstOrCreate(['email' => $user_info['email']], $user_info);
    $response = $this->post(route('post_login'), $user_info);
    $response->assertOk();
});

