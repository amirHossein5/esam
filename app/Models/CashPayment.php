<?php

namespace App\Models;

use App\Casts\ToEnglishMoney;
use App\Models\Market\Payment;
use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CashPayment extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'user_id', 'pay_date'];

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
