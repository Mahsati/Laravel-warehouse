<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productRequest extends FormRequest
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
            'brand_id'=>'required',
            'mehsul'=>'required',
            'al'=>'required',
            'sat'=>'required',
            'stok'=>'required',
        ];
    }

    
    public function messages()
    {
        return [
            'brand_id.required'=>'Brendi daxil etmədiniz',
            'mehsul.required'=>'Məhsulu daxil etmədiniz',
            'al.required'=>'Alış dəyərini daxil etmədiniz',
            'sat.required'=>'Satış dəyərini daxil etmədiniz',
            'stok.required'=>'Miqdarı daxil etmədiniz',

        
        ];
    }
    
}
