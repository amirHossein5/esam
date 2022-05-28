<?php

namespace App\Models\Market;

use App\Casts\ToEnglishMoney;
use App\Models\ProductQuestion;
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

    /** disable_for_report column */
    const DISABLE_FOR_REPORT = 1;
    const NOT_DISABLE_FOR_REPORT = 0;

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

    protected $dates = [
        'published_at'
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
    public function questions(): HasMany
    {
        return $this->hasMany(ProductQuestion::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function amazingSale(): HasOne
    {
        return $this->hasOne(AmazingSale::class);
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

    public function scopeActives(Builder $query): Builder
    {
        // without checking quantity
        return $query->where('published_at', '<=', now())
            ->where('marketable', 1)
            ->where('disabled_for_report', self::NOT_DISABLE_FOR_REPORT);
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

    public function isActive(): Attribute
    {
        // without checking quantity and disabled for report

        return new Attribute(
            get: fn () => $this->marketable and $this->published_at->lte(now())
        );
    }

    public function deliveryAmountReadable(): Attribute
    {
        return new Attribute(
            get: fn () => fa_price($this->delivery_amount)
        );
    }
}
