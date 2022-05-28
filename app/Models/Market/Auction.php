<?php

namespace App\Models\Market;

use App\Casts\ToEnglishMoney;
use App\Models\AuctionPeriod;
use App\Models\AuctionSuggestion;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Auction extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'start_price', 'reserved_price', 'urgent_price', 'start_date', 'end_date', 'period_id'];

    protected $casts = [
        'start_price' => ToEnglishMoney::class,
        'reserved_price' => ToEnglishMoney::class,
        'urgent_price' => ToEnglishMoney::class,
    ];

    protected $appends = ['start_price_readable', 'reserved_price_readable', 'urgent_price_readable'];

    protected $dates = [
        'start_date', 'end_date'
    ];

    /**
     * Relations
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'auction_follower');
    }

    public function suggestions(): HasMany
    {
        return $this->hasMany(AuctionSuggestion::class, 'auction_id');
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

    public function isActive(): Attribute
    {
        return new Attribute(
            get: fn () => $this->end_date->gte(now()) and $this->start_date->lte(now())
        );
    }

    /**
     * Scopes
     */
    public function scopeActives(Builder $query): Builder
    {
        return $query->where('end_date', '>=', now())
            ->where('start_date', '<=', now());
    }
}
