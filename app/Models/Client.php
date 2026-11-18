<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
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
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    /** URL foto profil, atau null bila belum ada foto. */
    public function avatarUrl(): ?string
    {
        return $this->avatar_path ? asset('storage/'.$this->avatar_path) : null;
    }
}
