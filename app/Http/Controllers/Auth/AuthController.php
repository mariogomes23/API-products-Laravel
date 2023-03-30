<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    //
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;

    }
    //=========================================

    public function login(LoginRequest $request)
    {

          $users = $this->user->where("email",$request->email)->first();

          if($users && Hash::check($request->password,$users->password) )
          {

            $token = $users->createToken("admin")->plainTextToken;
            return [
                "token"=>$token
            ];
          }


          return  response([

            "error" => "erro de login",
            Response::HTTP_UNAUTHORIZED
          ]);

    }

    //============================================


    public function register(RegisterRequest $request)
    {
        $users = $this->user->create(
            [
                "first_name"=>$request->first_name,
                "last_name"=>$request->last_name,
                "password"=>Hash::make($request->password),
                "email"=>$request->email,
            ]
            );

            return response()->json([

                "user"=>$users,
                "status"=>202
            ]);

    }

}
