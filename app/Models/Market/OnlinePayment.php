<?php

namespace App\Models\Market;

use App\Casts\ToEnglishMoney;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class OnlinePayment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['amount', 'user_id', 'gateway', 'transaction_id', 'bank_first_response', 'bank_second_response', 'status'];

    protected $casts = ['amount' => ToEnglishMoney::class];

    /**
     * Relations
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function payments()
    {
        return $this->morphMany(Payment::class, 'paymentable');
    }

    /**
     * Accessors
     */
    public function amountReadable(): Attribute
    {
        return new Attribute(
            get: fn () => fa_price($this->amount)
        );
    }
}
