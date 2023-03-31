<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\RoleCreateRequest;
use App\Http\Requests\Role\RoleUpdateRequest;
use App\Http\Resources\Role\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    private $role;

    public function __construct(Role $role)
    {
        $this->role = $role;

    }
    // ============================================

    public function index(){

    $roles = $this->role->paginate();

    return RoleResource::collection($roles);
    }

    //================================================
    public function show($id){

        $roles = $this->role->findOrFail($id);

        return new RoleResource($roles);

        }


        //============================
        public function store(RoleCreateRequest $request){

            $roles = $this->role->create([

                "name"=>$request->name,

            ]);

            return new RoleResource($roles);

            }

        // ====================================================

        public function update(RoleUpdateRequest $request,$id){

            $roles = $this->role->findOrFail($id);
            $roles->update([

                "name"=>$request->name ]);

            return new RoleResource($roles);
            }

            //=================================================

            public function destroy($id){

                $roles = $this->role->findOrFail($id);
                $roles->delete();

                return new RoleResource($roles);
                }

                //=================================

}
