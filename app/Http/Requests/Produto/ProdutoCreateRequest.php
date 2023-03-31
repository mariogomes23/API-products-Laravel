<?php

namespace App\Http\Requests\Produto;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoCreateRequest extends FormRequest
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
            "title"=>["required","string","min:3","max:50"],
            "description"=>["required","string","max:200"],
            "price"=>["required","numeric","min:1"],
            "image"=>["required","image","mimes:png,jpg,gif"]
            //
        ];
    }
}
