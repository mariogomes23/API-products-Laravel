<?php

namespace Database\Seeders\Order;

use App\Models\OrdemItem;


use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Order::factory()->count(10)->create()->each(function(Order $order){
        OrdemItem::factory()->count(10)->create([
            "order_id"=>$order->id
        ]);
        });



    }
}
