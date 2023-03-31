<?php

namespace Database\Seeders\OrdemItem;

use App\Models\OrdemItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdemItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
       OrdemItem::factory()->count(10)->create();

    }
}
