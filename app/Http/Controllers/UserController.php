<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;

    }
    // ============================================

    public function index(){

    $users = $this->user->paginate(5);

    return UserResource::collection($users);
    }

    //================================================
    public function show($id){

        $users = $this->user->findOrFail($id);

        return new UserResource($users);

        }
        public function store(UserCreateRequest $request){

            $users = $this->user->create([

                "first_name"=>$request->first_name,
                "last_name"=>$request->last_name,
                "email"=>$request->email,
                "password"=>Hash::make($request->password),
            ]);

            return new UserResource($users);

            }

        // ====================================================

        public function update(UserUpdateRequest $request,$id){

            $users = $this->user->findOrFail($id);
            $users->update([

                "first_name"=>$request->first_name,
                "last_name"=>$request->last_name,
                "email"=>$request->email,
                "password"=>Hash::make($request->password),

            ]);

            return new UserResource($users);
            }

            //=================================================

            public function destroy($id){

                $users = $this->user->findOrFail($id);
                $users->delete();

                return new UserResource($users);
                }



}
