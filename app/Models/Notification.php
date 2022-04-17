<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Notification extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'data' => 'array',
        'id' => 'string',
    ];

    /**
     * Relations
     */
    public function notifiable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Scopes
    */
    public function scopeUnseen($query): Builder
    {
        return $query->whereNull('read_at');
    }
}
