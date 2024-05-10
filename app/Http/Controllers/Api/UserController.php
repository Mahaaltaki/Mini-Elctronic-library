<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
//use Ramsey\Uuid\Rfc4122\Validator;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
//use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function createUser(Request $request){
        try{
            //validated
            $validateUser = Validator::make($request->all(),
            [
                'name'=>'required|string',
                'email'=>'required|string|email|unique:users',
                'password'=>'required|min:8'
            ]);
            if($validateUser->fails()){
                return response()->json([
                    'status'=>false,
                     'message'=>'validation error',
                     'errors' =>$validateUser->errors()
                ],401);
            }
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'Role'=> 'member']);
                return $request->responce()->json([
                    'status'=>true,
                     'message'=>'User create successfully',
                     'token' =>$user->createToken("authToken")->plainTextToken
                ],401);
            }catch(\Throwable $th){
                return response()->json([
                    'status'=>false,
                    'message' =>$th->getMessage()
                ],500);
            }
        }
        public function login(Request $request){

            try{
                $validateUser =Validator::make($request->all(),
                [
                    'email'=> 'required|email',
                    'password'=>'required'
                ]);
                if($validateUser->fails()){
                    return response()->json([
                    'status'=>false,
                    'message' =>'validation error',
                    'errors' => $validateUser->errors()
                    ],401);
                }
                if (!\Auth::attempt($request->only('email', 'password'))) {
                    return response()->json([
                        'status'=>false,
                        'message' => 'Email & password does not match with our record.'
                    ], 401);
                }
                
                $user = User::where('email', $request->email)->firstOrFail();

                $token = $user->createToken("authToken")->plainTextToken;

                return response()->json([
                'status'=>true,
                'message'=>'user logged in successfully',
                'access_token' => $token,
                'token_type' => 'Bearer',
    ],200);
            }catch(\Throwable $th){
                return response()->json([
                    'status'=>false,
                    'message' =>$th->getMessage()
                ],500);
            }
        }
    }


