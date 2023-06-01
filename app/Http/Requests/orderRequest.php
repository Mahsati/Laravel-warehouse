<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class orderRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'client_id'=>'required',
            'product_id'=>'required',
            'miqdar'=>'required'



        ];
    }

    public function messages()
    {
        return [
            'client_id.required'=>'Müştərini daxil etmədiniz',
            'product_id.required'=>'Məhsulu daxil etmədiniz',
            'miqdar.required'=>'Miqdarı daxil etmədiniz'



        ];
    }
}
