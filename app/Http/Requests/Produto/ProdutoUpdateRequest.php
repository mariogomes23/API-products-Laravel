<?php

namespace App\Http\Requests\Produto;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "title"=>["nullable","string","min:3","max:50"],
            "description"=>["nullable","string","max:200"],
            "price"=>["nullable","numeric","min:1"],
            "image"=>["nullable","image","mimes:png,jpg,gif"]
            //
        ];
    }
}
