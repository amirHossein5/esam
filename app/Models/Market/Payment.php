<?php

namespace App\Models\Market;

use App\Casts\ToEnglishMoney;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * statuses
     */
    const NOTPAID = 0;
    const PAID = 1;
    const REJECTED = 2;
    const RETURNED = 3;

    const STATUSES = [
        0, 1, 2, 3
    ];

    /**
     * types (alternative for polymorphic)
     */
    const ONLINE = 'online';

    protected $fillable = ['amount', 'user_id', 'status', 'type_id', 'paymentable_id', 'paymentable_type'];

    protected $casts = ['amount' => ToEnglishMoney::class];

    protected $appends = [
        'status_readable', 'amount_readable'
    ];

    /**
     * Relations
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function paymentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function paymentType(): BelongsTo
    {
        return $this->belongsTo(PaymentType::class, 'type_id');
    }

    /**
     * Accessors
     */
    public function statusReadable(): Attribute
    {
        return new Attribute(
            get: function () {
                switch ($this->status) {
                    case self::NOTPAID:
                        return 'پرداخت نشده';
                        break;

                    case self::PAID:
                        return 'پرداخت شده';
                        break;

                    case self::REJECTED:
                        return 'باطل شده';
                        break;

                    case self::RETURNED:
                        return 'برگشت داده شده';
                        break;
                }
        });
    }
    
    public function amountReadable(): Attribute
    {
        return new Attribute(
            get: fn () => fa_price($this->amount)
        );
    }
}
