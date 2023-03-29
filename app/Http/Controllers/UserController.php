<?php

namespace App\Http\Controllers;

use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

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

    $users = $this->user->all();

    return UserResource::collection($users);
    }

    //================================================
    public function show($id){

        $users = $this->user->findOrFail($id);

        return new UserResource($users);

        }
        public function store(Request $request){

            $users = $this->user->create($request->all());

            return new UserResource($users);

            }

        // ====================================================

        public function update(Request $request,$id){

            $users = $this->user->findOrFail($id);
            $users->update($request->all());

            return new UserResource($users);
            }

            //=================================================

            public function delete($id){

                $users = $this->user->findOrFail($id);
                $users->delete();

                return new UserResource($users);
                }



}
