<?php

namespace App\Models\Content;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FAQ extends Model
{
    use HasFactory, Sluggable;

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

    public function faqCategory(): BelongsTo
    {
        return $this->belongsTo(FAQCategory::class);
    }
}
