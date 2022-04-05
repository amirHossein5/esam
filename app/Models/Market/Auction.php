<?php

namespace App\Models\Market;

use App\Casts\ToEnglishMoney;
use App\Models\AuctionPeriod;
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

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function period(): BelongsTo
    {
        return $this->belongsTo(AuctionPeriod::class);
    }
}
