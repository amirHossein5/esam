<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Otp extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'token', 'type', 'login_id', 'user_id'];

    // type
    const MOBILE = 0;
    const EMAIL = 1;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeActive($query, int $minutes = 2): Builder
    {
        return $query->where('updated_at', '>=', now()->subMinutes($minutes));
    }

    public function scopeNotActives($query, int $minutes = 2): Builder
    {
        return $query->where('updated_at', '<', now()->subMinutes($minutes));
    }
}
