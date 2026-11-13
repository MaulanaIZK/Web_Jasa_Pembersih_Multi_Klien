<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id',
        'name',
        'category',
        'description',
        'base_price',
        'image_url',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'base_price' => 'integer',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
