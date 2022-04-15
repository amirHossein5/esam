<?php

namespace App\Models\Market;

use App\Casts\ToEnglishMoney;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
        'marketable_number' => 'integer',
        'delivery_amount' => ToEnglishMoney::class,
    ];

    protected $appends = [
        'marketable_readable'
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
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function sellType(): BelongsTo
    {
        return $this->belongsTo(SellType::class);
    }

    public function attributeValues(): HasMany
    {
        return $this->hasMany(ProductAttributeValue::class);
    }

    public function auction(): HasOne
    {
        return $this->hasOne(Auction::class);
    }

    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function galleries(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function weight(): BelongsTo
    {
        return $this->belongsTo(ProductWeight::class);
    }

    /**
     * Scopes
     */
    public function scopeFreeDelivery(Builder $query): Builder
    {
        return $query->where('delivery_amount', 0);
    }

    /**
     * Accessors
     */
    public function marketableReadable(): Attribute
    {
        return new Attribute(
            get: fn () => (bool) $this->marketable ? 'هست' : 'نیست'
        );
    }

    public function deliveryIsFree(): Attribute
    {
        return new Attribute(
            get: fn () => $this->delivery_amount == true ? 0 : 1
        );
    }
}
