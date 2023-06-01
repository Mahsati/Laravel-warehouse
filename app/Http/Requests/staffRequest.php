<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class staffRequest extends FormRequest
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
            'ad'=>'required',
            'soyad'=>'required',
            'tel'=>'required',
            'email'=>'required|email',
            'maas'=>'requred',
            'vezife'=>'required',
            'hired'=>'required'


        ];
    }

    public function messages(){

        return[
                'ad.required'=>'Ad daxil etmədiniz',
                'soyad.required'=>'Soyad daxil etmədiniz',
                'tel.required'=>'Telefon daxil etmədiniz',
                'email.required'=>'Email daxil etmədiniz',
                'maas.requred'=>'Maaş daxil etmədiniz',
                'vezife.required'=>'Vəzifə daxil etmədiniz',
                'hired.required'=>'Tarix daxil etmədiniz'


        ];
    }
}
