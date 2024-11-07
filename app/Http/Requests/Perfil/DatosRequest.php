<?php

namespace App\Http\Requests\Perfil;

use Illuminate\Foundation\Http\FormRequest;

class DatosRequest extends FormRequest
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
            'name'    => 'required|min:3|max:50',
            //'sexo' => 'required',
            'telefono' => 'required|min:3|max:13',
            //'email' => 'required|email|unique:users,email',
            //'password' => 'required|min:3|max:13',
            'documento' => 'required|size:10',
        ];
    }

    
}
