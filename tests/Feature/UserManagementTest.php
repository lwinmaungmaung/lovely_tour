<?php

use App\Models\User;

uses()->group('user');

beforeEach(function(){
    $user_info = ['name'=> 'user','email'=>'user@example.com','password'=>'password','user_level'=>'admin'];
    User::firstOrCreate(['email' => $user_info['email']], $user_info);
    $response = $this->post(route('post_login'), $user_info);
    $this->access_token = $response->json('access_token');
});

it('tests user can authenticate properly', function () {
    $response = $this->withHeaders(['Authorization' => 'Bearer '. $this->access_token, 'Accept' => 'application/json'])->get(route('user.index'));
    $response->assertOk();
});

it('tests user can view the user management page',function(){
    $response = $this->withHeaders(['Authorization' => 'Bearer '. $this->access_token, 'Accept' => 'application/json'])->get(route('user.index'));
    $users_count = User::all()->count();
    $response->assertOk();
    $response->assertJsonIsArray('data');
    $response->assertJsonCount($users_count, 'data');
    $response->assertJsonStructure(['data','links','meta']);
});

it('tests user can create a new user', function () {
    $new_user_info=['name'=>'new user','email'=>'new_user@newuser.com','password'=>'test','password_confirmation'=>'test','user_level'=>'admin'];
    User::where('email',$new_user_info['email'])->delete();
    $response = $this->withHeaders(['Authorization' => 'Bearer '. $this->access_token, 'Accept' => 'application/json'])->post(route('user.store'),$new_user_info);
    $response->assertCreated();
    $response->assertJson(['message'=>'user created successfully.']);
});

it('can view the specified user', function () {
    $selected_user = User::latest()->get()->first();
    $response = $this->withHeaders(['Authorization' => 'Bearer '. $this->access_token, 'Accept' => 'application/json'])->get(route('user.show',['user'=>$selected_user]));
    $response->assertOk();
    $response->assertJsonStructure(["data"=>['id', 'name', 'email', 'user_level']]);
});

it('can update the specified user', function () {
    $selected_user = User::latest()->get()->first();
    $update_user_info=['name'=>$selected_user->name,'email'=>$selected_user->email,'password'=>'password','password_confirmation'=>'password','user_level'=>'admin'];
    $response = $this->withHeaders(['Authorization' => 'Bearer '. $this->access_token, 'Accept' => 'application/json'])->put(route('user.update',['user'=>$selected_user]),$update_user_info);
    $response->assertOk();
    $response->assertJson(['message'=>'user updated successfully.']);
});

it('can delete the specified user', function () {
    $selected_user = User::latest()->get()->first();
    $response = $this->withHeaders(['Authorization' => 'Bearer '. $this->access_token, 'Accept' => 'application/json'])->delete(route('user.destroy',['user'=>$selected_user]));
    $response->assertStatus(410);
    $response->assertJson(['message' => 'user removed successfully.']);
});
