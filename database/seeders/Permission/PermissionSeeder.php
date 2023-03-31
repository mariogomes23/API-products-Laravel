<?php

namespace Database\Seeders\Permission;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Permission::insert([

            ["name"=>"views_users"],
            ["name"=>"edit_users"],

            ["name"=>"views_roles"],
            ["name"=>"edit_roles"],

            ["name"=>"views_products"],
            ["name"=>"edit_products"],

            ["name"=>"views_orders"],
            ["name"=>"edit_orders"],

        ]);
    }
}
