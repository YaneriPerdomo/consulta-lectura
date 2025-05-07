<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ConfigurationRequest extends FormRequest
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
        $roles = [
            'user' => 'required|string|max:55',
            'email' => 'required|email',
        ];
        if (Auth::user()->role_id == 2) {
            $roles = array_merge($roles, [
                'name_lastname' => 'string|max:100',
                'cedula' => 'required|integer',
                'number' => 'nullable|min:0|max:999999|regex:/^\+[0-9]+$/',
            ]);
        }else{
        }

        return $roles;
    }

    public function messages()
    {
        return [
            'user.required' => 'El campo :attribute es obligatorio.',
            'user.string' => 'El campo :attribute no debe contener números o caracteres especiales.',
            'user.max' => 'El campo :attribute no debe exceder los :max caracteres.',
            'email.required' => 'El campo :attribute es obligatorio.',
            'email.email' => 'El campo :attribute debe tener un formato válido.',
            'name_lastname.string' => 'El campo :attribute debe ser una cadena de texto.',
            'cedula.required' => 'El campo :attribute es obligatorio.',
            'cedula.integer' => 'El campo :attribute debe contener solo números enteros.',
            'number.regex' => 'El campo :attribute debe tener un formato valido.',
        ];
    }
    public function attributes()
    {
        return [
            'user' => 'Usuario',
            'password' => 'Contraseña',
            'password_confirmation' => 'Confirmar contraseña',
            'name_lastname' => 'Nombre y apellido',
            'cedula' => 'Cédula de identidad',
            'email' => 'Correo electronico',
            'number' => 'numero'
        ];
    }
}
