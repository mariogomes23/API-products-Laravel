<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [

            //
            "first_name" => ["required"],
            "last_name" => ["required"],
            "email" => ["required","email","unique:users"],
            "password" => ["required"]

        ];
    }
}
