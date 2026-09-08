<?php

namespace App\Http\Requests\Categories;

// use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class UpdateCatRequest extends FormRequest
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
            'kategori' => ['required', 'unique:categories', 'max:255']
        ];
    }

    #[Override]
    public function messages()
    {
        return[
            'kategori.required' => 'Kategori tidak boleh kosong',
            'kategori.unique' => 'Kategori sudah terdafta',
            'kategori.max' => 'nama kategori maksimal 255 karakter'
        ];  
    }
}
