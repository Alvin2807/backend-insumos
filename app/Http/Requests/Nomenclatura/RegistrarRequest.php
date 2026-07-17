<?php

namespace App\Http\Requests\Nomenclatura;

use Illuminate\Foundation\Http\FormRequest;

class RegistrarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fk_despacho' =>'required|integer',
            'fk_tipo_impresora'=>'required|integer',
            'fk_modelo' =>'required|integer',
            'nomenclatura'=>'required|string',
            'direccion_ip' =>'nullable|string',
            'usuario_crea' =>'required|string'
        ];
    }
}
