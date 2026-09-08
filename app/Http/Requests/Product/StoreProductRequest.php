<?php

namespace App\Http\Requests\Product;

// use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class StoreProductRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'jumlah' => ['required', 'integer', 'min:0'],
            'categori_id' => ['required', 'exists:categories,id']
        ];
    }

    #[Override]
    public function messages(): array
    {
        return[
            'name.required' => 'Nama tidak boleh kosong',
            'name.max' => 'Masksimal karater 255',
            'jumlah.required' => 'Jumlah tidak boleh kosong',
            'jumlah.min' => 'jumlah tidak boleh negatif',
            'categori_id.required' => 'Id Category tidak boleh kosong',
            'categori_id.exists' => 'Kategori di pilih tidak valid' 
        ];
    }
}
