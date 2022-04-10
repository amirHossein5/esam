<?php

namespace App\Models;

use App\Models\Market\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Support extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_id','product_id', 'question_id', 'status', 'seen'];

    protected $appends = [
        'status_readable'
    ];

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

    public function question(): BelongsTo
    {
        return $this->belongsTo($this, 'question_id');
    }

    public function answers(): HasMany
    {
        return $this->hasMany($this, 'question_id');
    }

    /**
     * Scopes
     */
    public function scopeQuestions($query): Builder
    {
        return $query->whereNull('question_id');
    }

    public function scopeJustAnswers($query): Builder
    {
        return $query->whereNotNull('question_id');
    }

    public function scopeIsOpen($query): Builder
    {
        return $query->where('status', self::OPEN);
    }

    public function scopeIsClose($query): Builder
    {
        return $query->where('status', self::CLOSED);
    }

    public function scopeSeen($query): Builder
    {
        return $query->where('seen', self::SEEN);
    }

    public function scopeUnSeen($query): Builder
    {
        return $query->where('seen', self::UNSEEN);
    }

    /**
     * Accessors
     */
    public function statusReadable(): Attribute
    {
        return new Attribute(
            get: function () {
                switch ($this->status) {
                    case 0:
                        return 'باز';
                        break;
                    case 1:
                        return 'بسته';
                        break;
                }
            }
        );
    }
}
