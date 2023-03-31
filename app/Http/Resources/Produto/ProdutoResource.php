<?php

namespace App\Http\Resources\Produto;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProdutoResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [

            "id" => $this->id,
            "title" => $this->title,
            "description"=>$this->description,
            "image"=>$this->image,
            "price"=>$this->price,



        ];
    }
}
