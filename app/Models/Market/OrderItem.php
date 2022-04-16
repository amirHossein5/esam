<?php

namespace App\Models\Market;

use App\Casts\ToEnglishMoney;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'amazing_sale_discount_amount' => ToEnglishMoney::class,
        'final_product_price' => ToEnglishMoney::class,
        'final_total_price' => ToEnglishMoney::class,
    ];

    protected $appends = [
        'amazing_sale_discount_amount_readable',
        'final_product_price_readable',
        'final_total_price_readable',
    ];

    /**
     * Accessors
     */
    public function amazingSaleDiscountAmountReadable(): Attribute
    {
        return new Attribute(
            get: fn () => fa_price($this->amazing_sale_discount_amount)
        );
    }

    public function finalProductPriceReadable(): Attribute
    {
        return new Attribute(
            get: fn () => fa_price($this->final_product_price)
        );
    }

    public function finalTotalPriceReadable(): Attribute
    {
        return new Attribute(
            get: fn () => fa_price($this->final_total_price)
        );
    }

    /**
     * Relations
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function variant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class);
    }

    public function amazingSale(): BelongsTo
    {
        return $this->belongsTo(AmazingSale::class);
    }
}
