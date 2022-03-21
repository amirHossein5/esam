<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Support extends Model
{
    use HasFactory;

    // status
    const OPEN = 0;
    const CLOSED = 1;

    // seen
    const UNSEEN = 0;
    const SEEN = 1;

    /**
     * Relations
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Scopes
     */
    public function scopeAnswers($query): Builder
    {
        return $query->whereNull('support_id');
    }

    public function scopeIsOpen($query): Builder
    {
        return $query->where('status', self::OPEN);
    }

    public function scopeClosed($query): Builder
    {
        return $query->where('status', self::CLOSED);
    }
}
