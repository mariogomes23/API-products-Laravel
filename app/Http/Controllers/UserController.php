<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    private $user;

    public function __construct(User $user)
    {

       // Gate::authorize("view","users");
        $this->user = $user;

    }
    // ============================================

    public function index(){

    $users = $this->user->with("role")->paginate();

    return UserResource::collection($users);
    }

    //================================================
    public function show($id){

        $users = $this->user->with("role")->findOrFail($id);

        return new UserResource($users);

        }
        public function store(UserCreateRequest $request){

            $users = $this->user->create([

                "first_name"=>$request->first_name,
                "last_name"=>$request->last_name,
                "email"=>$request->email,
                "role_id"=>$request->role_id,
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
                "role_id"=>$request->role_id,
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

                //=================================


                public function user()
                {
                    $users =auth()->user();

                    return response()->json([
                        "user"=>$users,
                        "permissions"=>$users->permissions()
                    ]);
                }

                // ============================================

                public function updateInfo(Request $request)
                {
                    $users = auth()->user();

                    $users->update([

                        "first_name" => $request->first_name,
                        "last_name" => $request->last_name,
                        "email" => $request->email,

                    ]);

                    return new UserResource($users);

                }

                // ===============================================

                public function updatePassword(Request $request)
                {
                    $users = $this->user();

                    $users->update([
                        "password" => Hash::make($request->password)
                    ]);

                    return new UserResource($users);

                }


}









