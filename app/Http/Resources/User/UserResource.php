<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Role\RoleResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return
         [
            "first_name"=>$this->first_name,
            "last_name"=>$this->last_name,
            "email"=>$this->email,
            "created_at"=>Carbon::make($this->created_at)->format("d/m/y"),
            "role" => $this->role


        ];
    }
}
