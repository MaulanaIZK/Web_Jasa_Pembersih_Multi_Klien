<?php

namespace App\Modules\Catalog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;   // otorisasi ditangani Policy di controller
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
            'category' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:2000'],
            'base_price' => ['required', 'integer', 'min:1'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'jenis layanan',
            'category' => 'kategori',
            'description' => 'deskripsi',
            'base_price' => 'harga dasar',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Jenis layanan wajib diisi.',
            'category.required' => 'Kategori wajib diisi.',
            'description.required' => 'Deskripsi wajib diisi.',
            'base_price.required' => 'Harga dasar wajib diisi.',
            'base_price.integer' => 'Harga dasar harus berupa angka bulat (Rupiah), tanpa titik atau koma.',
            'base_price.min' => 'Harga dasar minimal Rp 1.',
        ];
    }
}
