<?php

namespace App\Http\Controllers\API;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(Request $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $remember = $request->remember;
        if($remember){
            cookie('remember', json_encode('hello world'), 100000);
        }
        if( auth()->attempt($credentials,$remember) ) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('AppName')->accessToken;
            return response()->json(['success' => $success], 200);
        } else {
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        if ($validator->fails()) {
          return response()->json([ 'error'=> $validator->errors() ]);
        }

        $data = $request->all();

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        $success['token'] =  $user->createToken('AppName')->accessToken;

        return response()->json(['success'=>$success], 200);

    }

}

