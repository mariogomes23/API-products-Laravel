<?php

namespace Database\Seeders\Role;

use App\Models\Role;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        //Role::factory()->count(10)->create();

        Role::create(["name"=>"Admin"]);
        Role::create(["name"=>"Editor"]);
        Role::create(["name"=>"Views"]);
    }
}
