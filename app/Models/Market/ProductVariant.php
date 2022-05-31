<?php

namespace App\Models\Market;

use App\Casts\ToEnglishMoney;
use App\Models\VariantFrozenNumber;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = ['sold_number', 'marketable_number', 'price', 'product_id','active'];

    protected $casts = [
        'price' => ToEnglishMoney::class,
    ];

    protected $appends = [
        'price_readable'
    ];

    /**
     * Relations
     */
    public function frozenNumber(): HasMany
    {
        return $this->hasMany(VariantFrozenNumber::class, 'variant_id');
    }

    public function selectableAttributes(): HasMany
    {
        return $this->hasMany(ProductVariantSelectableAttribute::class, 'variant_id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Accessors
     */
    public function priceReadable(): Attribute
    {
        return new Attribute(
            get: fn() => fa_price($this->price)
        );
    }
}
