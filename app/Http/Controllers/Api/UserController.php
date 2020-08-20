<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function register(Request $request)
     {
         $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
         ]);

         $user = User::Create([
             'name' => $request->name,
             'email' => $request->email,
             'password' => bcrypt($request->password),
             'api_token' => Str::random(80),
         ]);

         return (new UserResource($user))->additional([
             'meta' => [
                 'token' => $user->api_token,
             ],
         ]);
     }

    public function login(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if(auth()->attempt($request->only('email','password'))){
            $currentUser = auth()->user();

            return (new UserResource($currentUser))->additional([
                'meta' => [
                    'token' => $currentUser->api_token,
                ],
            ]);
        }

        return response()->json([
            'eror' => 'Login Failed'
        ], 401);
    }
    
    public function index(){
        $user = auth()->user();

        return new UserResource($user);
    }
}
