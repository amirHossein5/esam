<?php

namespace App\Models\Market;

use App\Casts\ToEnglishMoney;
use App\Models\AuctionPeriod;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Auction extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'start_price', 'reserved_price', 'urgent_price', 'start_date', 'period_id'];

    protected $casts = [
        'start_price' => ToEnglishMoney ::class,
        'reserved_price' => ToEnglishMoney::class,
        'urgent_price' => ToEnglishMoney::class,
    ];

    protected $appends = ['start_price_readable', 'reserved_price_readable', 'urgent_price_readable'];

    /**
     * Relations
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function period(): BelongsTo
    {
        return $this->belongsTo(AuctionPeriod::class);
    }

    /**
     * Accessors
     */
    public function startPriceReadable(): Attribute
    {
        return new Attribute(
            get: fn () => fa_price($this->start_price)
        );
    }

    public function reservedPriceReadable(): Attribute
    {
        return new Attribute(
            get: fn () => fa_price($this->reserved_price)
        );
    }

    public function urgentPriceReadable(): Attribute
    {
        return new Attribute(
            get: fn () => fa_price($this->urgent_price)
        );
    }
}
