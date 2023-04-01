<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\RoleCreateRequest;
use App\Http\Requests\Role\RoleUpdateRequest;
use App\Http\Resources\Role\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            if($permissions = $request->input("permissions"))
            {
                foreach($permissions as $permission)
                {

                    DB::table("role_permission")->insert([

                        "role_id"=>$roles->id,
                        "permission_id"=>$permission->id
                    ]);

                }
            }

            return new RoleResource($roles);

            }

        // ====================================================

        public function update(RoleUpdateRequest $request,$id){

            $roles = $this->role->findOrFail($id);
            $roles->update([

                "name"=>$request->name ]);
                DB::table("role_permission")->where("role_id",$roles->id->delete());

                if($permissions = $request->input("permissions"))
                {
                    foreach($permissions as $permission)
                    {

                        DB::table("role_permission")->insert([

                            "role_id"=>$roles->id,
                            "permission_id"=>$permission->id
                        ]);

                    }
                }

            return new RoleResource($roles);
            }

            //=================================================

            public function destroy($id){

                $roles = $this->role->findOrFail($id);

                DB::table("role_permission")->where("role_id",$roles->id->delete());

                $roles->delete();

                return new RoleResource($roles);
                }

                //=================================

}
