<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\Order\OrderSeeder;
use Database\Seeders\Permission\PermissionSeeder;
use Database\Seeders\Role\RoleSeeder;
use Database\Seeders\User\UserSeeder;
use Database\Seeders\Produto\ProdutoSeeder;
use Database\Seeders\RolePermission\RolePermissionSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProdutoSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RolePermissionSeeder::class);
    }
}
