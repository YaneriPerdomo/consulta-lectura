<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/*Clase de solicitud de formulario llamado create cuenta */
class EmployeeUpdateRequest extends FormRequest
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
            'user' => 'required|string|max:55',
            'email' => 'required|email',
            'name_lastname' => 'string|max:100',
            'cedula' => 'required|integer',
            'number' => 'nullable|min:0|max:999999|regex:/^\+[0-9]+$/',
        ];
    }

    public function messages()
    {
        return [
            'user.required' => 'El campo :attribute es obligatorio.',
            'user.string' => 'El campo :attribute no debe contener números o caracteres especiales.',
            'user.max' => 'El campo :attribute no debe exceder los :max caracteres.',
            'email.required' => 'El campo :attribute es obligatorio.',
            'email.email' => 'El campo :attribute debe tener un formato válido.',
            'email.unique' => 'El :attribute ya está registrado.',
            'password.required' => 'El campo Contraseña es obligatorio.',
            'password.min' => 'El campo Contraseña debe tener al menos :min caracteres.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
            'password_confirmation.required' => 'El campo :attribute es obligatorio.',
            'name_lastname.string' => 'El campo :attribute debe ser una cadena de texto.',
            'cedula.required' => 'El campo :attribute es obligatorio.',
            'cedula.integer' => 'El campo :attribute debe contener solo números enteros.',
            'cedula.unique' => 'La :attribute ya está registrada.',
            'number.integer' => 'El campo :attribute debe contener solo números enteros.',

        ];
    }
    public function  attributes()
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
