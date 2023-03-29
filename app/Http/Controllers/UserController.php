<?php

namespace App\Http\Controllers;

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
        public function store(Request $request){

            $users = $this->user->create([

                "fisrt_name"=>$request->first_name,
                "last_name"=>$request->last_name,
                "email"=>$request->email,
                "password"=>Hash::make($request->password),
            ]);

            return new UserResource($users);

            }

        // ====================================================

        public function update(Request $request,$id){

            $users = $this->user->findOrFail($id);
            $users->update([

                "fisrt_name"=>$request->first_name,
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
