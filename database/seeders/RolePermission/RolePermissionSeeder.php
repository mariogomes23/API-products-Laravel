<?php

namespace Database\Seeders\RolePermission;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    private $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;

    }

    public function run(): void
    {
        //
        $permissions = $this->permission->all();
        $admin = Role::where("name","Admin")->first();

        foreach($permissions as $permission)
        {
              DB::table("role_permission")->insert([
                  "role_id"=>$admin->id,
                  "permission_id"=>$permission->id
              ]);
        }
        //==========================================


        $editor = Role::where("name","Editor")->first();
        foreach($permissions as $permission)
        {
            if(!in_array($permission->name,["edit_roles"]))
            {
                DB::table("role_permission")->insert([

                    "role_id"=>$editor->id,
                    "permission_id"=>$permission->id
                ]);
            }
        }


        $views = Role::where("name","Views")->first();
        $viewRoles = [

            "view_users",
            "view_roles",
            "view_products",
            "view_orders"
        ];
        foreach($permissions as $permission)
        {
            if(in_array($permission->name,$viewRoles))
            {
                DB::table("role_permission")->insert([

                    "role_id"=>$views->id,
                    "permission_id"=>$permission->id
                ]);
            }
        }

        

    }
}
