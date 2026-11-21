<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClientBalance extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'current_balance',
        'pending_balance',
    ];

    protected function casts(): array
    {
        return [
            'current_balance' => 'decimal:2',
            'pending_balance' => 'decimal:2',
        ];
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
