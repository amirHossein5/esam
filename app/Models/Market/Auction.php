<?php

namespace App\Models\Market;

use App\Models\AuctionPeriod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Auction extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'start_price', 'reserved_price', 'urgent_price', 'start_date', 'period_id'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function period(): BelongsTo
    {
        return $this->belongsTo(AuctionPeriod::class);
    }
}
