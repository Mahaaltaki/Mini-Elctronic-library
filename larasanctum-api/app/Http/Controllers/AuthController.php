<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class AuthController extends Controller
{
   
public function register(Request $request){
    try{
        DB::beginTransaction();
    $post_data = $request->validate([
        'name'=>'required|string',
        'email'=>'required|string|email|unique:users',
        'password'=>'required|min:8'
    ]);
  dd($post_data);
    // $user = User::create([
    //     'name' => $post_data['name'],
    //     'email' => $post_data['email'],
    //     'password' => Hash::make($post_data['password']),
    //     'Role'=> 'user'
    // ]);
    // $role=Role::where('name','user')->first();
    // $user->roles()->attach('member');
    // DB::commit();
    // $token = $user->createToken('authToken')->plainTextToken;
   // return $this->apiResponse(new UserResource($user),$token,'registered Successfully',200);}
   // catch(\Throwable $th){
    
   // Log::error($th);
    DB::rollBack();
    return $this->custumeResponse(null,'Error ,some thing is Ronge here',500);
}
}

public function login(Request $request){
    if (!\Auth::attempt($request->only('email', 'password'))) {
        return response()->json([
            'message' => 'Invalid login details'
        ], 401);
    }

    $user = User::where('email', $request['email'])->firstOrFail();

    $token = $user->createToken('authToken')->plainTextToken;

    return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
    ]);
}
}
