<?php

namespace App\Http\Resources\Role;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{

    public function toArray(Request $request): array
    {
       return [

        "name"=>$this->name,
        "users"=>$this->users
       ];
    }
}
