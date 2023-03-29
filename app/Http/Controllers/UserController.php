<?php

namespace App\Http\Controllers;

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

    return response()->json($users);
    }

    //================================================
    public function show($id){

        $users = $this->user->findOrFail($id);

        return response()->json([
            "message"=>201
        ]);

        }

        // ====================================================

        public function update(Request $request,$id){

            $users = $this->user->all();

            return response()->json($users);

            }

            //=================================================

            public function delete($id){

                $users = $this->user->all();

                return response()->json($users);
                }



}
