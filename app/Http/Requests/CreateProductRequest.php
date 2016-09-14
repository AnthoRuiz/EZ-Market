<?php

namespace market\Http\Requests;

use Dingo\Api\Http\FormRequest as Request;

class CreateProductRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'=> 'required|max:50',
            'descripcion'=> 'required|max:255',
            'categoria'=> 'required|integer',
            'precio'=> 'required|integer',
            'imagen'=> 'required|max:255'
        ];
    }
}