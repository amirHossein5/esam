<?php

namespace App\Models;

use App\Casts\ToEnglishMoney;
use App\Models\Market\Auction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuctionSuggestion extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'auction_id', 'suggested_amount'];

    protected $casts = ['suggested_amount' => ToEnglishMoney::class];

    /**
     * Relations
     */
    public function auction(): BelongsTo
    {
        return $this->belongsTo(Auction::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
