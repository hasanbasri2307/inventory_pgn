<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
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
            //
            'p_name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'sub_cat_id' => 'required'
        ];
    }
}
