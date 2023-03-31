<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            "product_title"=>$this->product_title,
            "price"=>$this->price,
            "quantity"=>(int) $this->quantity
        ];
    }
}
