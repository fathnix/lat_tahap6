<?php

namespace App\Http\Requests;

// use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class RegisterRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:55',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6'
        ];
    }

    #[Override]
    public function messages(): array
    {
        return[
            'name.required' => 'Nama Wajib di isi',
            'email.required' => 'email wajib di isi',
            'email.unique' => 'email sudah di gunakan',
            'email.email' => 'wajib berformat email',
            'password.required' => 'password wajib di isi' ,
            'password.min' => 'password minimal 6 hurur'
            ];
    }
}
