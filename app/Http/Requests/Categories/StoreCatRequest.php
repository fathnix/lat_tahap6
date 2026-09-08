<?php

namespace App\Http\Requests\Categories;

// use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class StoreCatRequest extends FormRequest
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
            'kategori' => ['required', 'string', 'unique:categories', 'max:255']
        ];
    }

    #[Override]
    public function messages(): array
    {
        return [
            'kategori.required' => 'Kategori Wajib di isi',
            'kategori.unique' => 'kategori sudah terdaftar',
            'kategori.max' => 'nama kategori maksimal 255 karakte'
        ];
    }
}
