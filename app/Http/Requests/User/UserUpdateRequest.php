<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [

            "email" => ["email"],
            "first_name" => ["required"],
            "last_name" => ["required"],
            "password" => ["required"],



            //
        ];
    }
}
