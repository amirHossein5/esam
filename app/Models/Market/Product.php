<?php

namespace App\Models\Market;

use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

    protected $casts = [
        'image' => 'array',
        'marketable' => 'boolean',
        'sold_number' => 'integer',
        'frozen_number' => 'integer',
        'marketable_number' => 'integer'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * Relations
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function sellType(): BelongsTo
    {
        return $this->belongsTo(SellType::class);
    }

    /**
     * Accessors
     */
    public function marketableReadable(): Attribute
    {
        return new Attribute(
            get: fn ($value) => (bool) $value ? 'هست' : 'نیست'
        );
    }
}
