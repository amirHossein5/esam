<?php

namespace App\Models\Content;

use Attribute;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class FAQCategory extends Model
{
    use HasFactory;

    protected $table = 'faq_categories';

    protected $fillable = ['name', 'status'];

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
    public function faqs(): HasMany
    {
        return $this->hasMany(FAQ::class, 'faq_category_id');
    }
}
