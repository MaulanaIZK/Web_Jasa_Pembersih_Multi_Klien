<?php

namespace App\Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // otorisasi ditangani ClientPolicy di controller
    }

    public function rules(): array
    {
        return [
            'business_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20', 'regex:/^(\+?62|0)[0-9]{8,13}$/'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->user()->id)],
            'service_area' => ['required', 'string', 'max:255'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }

    public function attributes(): array
    {
        return [
            'business_name' => 'nama bisnis',
            'phone' => 'nomor HP bisnis',
            'email' => 'email bisnis',
            'service_area' => 'lokasi bisnis',
            'avatar' => 'foto',
        ];
    }

    public function messages(): array
    {
        return [
            'business_name.required' => 'Nama bisnis wajib diisi.',
            'phone.required' => 'Nomor HP bisnis wajib diisi.',
            'phone.regex' => 'Format nomor HP tidak valid. Contoh: 081234567890 atau +6281234567890.',
            'email.required' => 'Email bisnis wajib diisi.',
            'email.email' => 'Format email tidak valid. Contoh: nama@domain.com.',
            'email.unique' => 'Email ini sudah dipakai akun lain. Gunakan email yang berbeda.',
            'service_area.required' => 'Lokasi bisnis wajib diisi.',
            'avatar.image' => 'Berkas harus berupa gambar (JPG, PNG, atau WebP).',
            'avatar.mimes' => 'Foto harus berformat JPG, PNG, atau WebP.',
            'avatar.max' => 'Ukuran foto maksimal 2 MB.',
        ];
    }
}
