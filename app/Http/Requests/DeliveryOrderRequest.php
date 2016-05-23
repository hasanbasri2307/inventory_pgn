<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DeliveryOrderRequest extends Request
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
        switch($this->method()){
            case 'POST':
                 return [
                    //
                    "do_date" => "required",
                    "po_id" => "required",
                    "file_do" => "required",
                    "latest_do" => "required"
                ];
                break;

            case 'PUT':
                 return [
                    //
                    "do_date" => "required",
                    "latest_do" => "required"
                ];
        }
       
    }
}
