<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'job' => 'required|max:40|regex:/^[A-Z]+$/',
            'description' => 'nullable|regex:/^[A-Z]+$/'
        ];
    }

    public function messages()
    {
        return [
            'job.required' => 'El campo :attribute es obligatorio.',
            'job.regex' => 'El campo :attribute debe tener un formato valido.',
            'job.max' => 'El campo :attribute no debe exceder los :max caracteres.',
            'description.nullable' => 'El campo :attribute no debe contener números o caracteres especiales.',
            'description.string' => 'El campo :attribute no debe exceder los :max caracteres.',
            'desscription.regex' => 'El campo :attribute debe tener un formato valido.',
        ];
    }

    public function attributes()
    {
        return [
            'job' => 'Cargo',
            'description' => 'Descripcion'
        ];
    }
}
