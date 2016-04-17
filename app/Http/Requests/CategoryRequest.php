<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CategoryRequest extends Request
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
        $rules = [
            'cat_name' => 'required'
        ];

        foreach($this->request->get('sub_cat') as $key => $val)
        {
            $rules['sub_cat.'.$key] = 'required';
        }

        return $rules;
    }

    public function messages(){
         $messages = [];
          foreach($this->request->get('sub_cat') as $key => $val)
          {
                $messages['sub_cat.'.$key.'.required'] = 'The "Sub Category '.$key.'" is required.';
          }
          return $messages;
    }

}
