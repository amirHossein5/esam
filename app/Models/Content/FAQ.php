<?php

namespace App\Models\Content;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class FAQ extends Model
{
    use HasFactory, Sluggable, HasEagerLimit;

    protected $table = 'faqs';

    protected $fillable = ['question', 'answer', 'slug', 'status', 'faq_category_id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'question'
            ]
        ];
    }

    // status
    const DISABLE = 0;
    const ENABLE = 1;

    /**
     * Scopes
     */
    public function scopeActives(Builder $query): Builder
    {
        return $query->where('status', self::ENABLE);
    }

    /**
     * Relations
     */
    public function faqCategory(): BelongsTo
    {
        return $this->belongsTo(FAQCategory::class);
    }
}
