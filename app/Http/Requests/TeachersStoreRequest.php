<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeachersStoreRequest extends FormRequest
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
            // 'name' => 'required',
            // 'email' => 'required|unique:teachers'
            'image' => 'mimes:jpg,png'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "Ismingizni yozing"
        ];
    }
}