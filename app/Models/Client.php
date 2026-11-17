<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';
    protected $primaryKey = 'idClient';

    protected $fillable = [
<<<<<<< HEAD
        'user_id',
        'name',
        'slug',
        'phone',
        'ktp_number',
        'face_verification_url',
        'business_name',
        'bank_name',
        'bank_account_number',
        'bank_account_holder',
        'description',
        'avatar_path',
        'service_area',
=======
        'namaPebisnis',
        'namaClient',
        'email',
        'noTelepon',
        'alamat',
        'layanan',
        'deskripsi',
>>>>>>> 0fe7a3d (dashbord dan landscape)
        'status',
        'fotoProfil',
        'tglNonAktif',
        'alasaNonaktif',
        'idAdmin',
    ];

    public function isActive(): bool
    {
        return strtolower((string) $this->status) === 'aktif' || strtolower((string) $this->status) === 'active';
    }

    /** URL foto profil, atau null bila belum ada foto. */
    public function avatarUrl(): ?string
    {
        return $this->avatar_path ? asset('storage/'.$this->avatar_path) : null;
    }
}
