<?php

namespace App\Models\Market;

use App\Casts\ToEnglishMoney;
use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    // delivery_status
    const NOTSENT = 0;
    const ISSENDING = 1;
    const SENT = 2;
    const RECEIVED = 3;

    // order_status
    const WAITING = 0;
    const ACCEPTED = 1;
    const NOTACCEPTED = 2;

    protected $casts = [
        'order_final_amount' => ToEnglishMoney::class,
        'order_discount_amount' => ToEnglishMoney::class,
        'order_copan_discount_amount' => ToEnglishMoney::class,
        'delivery_amount' => ToEnglishMoney::class
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'delivery_status_readable',
        'order_status_readable',

        'delivery_amount_readable',
        'order_final_amount_readable',
        'order_discount_amount_readable',
        'order_copan_discount_amount_readable',
    ];

    /**
     * Scopes
     */
    public function scopeSending(Builder $query): Builder
    {
        return $query->where('delivery_status', self::ISSENDING);
    }

    public function scopeUnpaid(Builder $query): Builder
    {
        return $query->whereHas('payment', function ($query) {
            $query->where('status', Payment::NOTPAID);
        });
    }

    public function scopeRejected(Builder $query): Builder
    {
        return $query->whereHas('payment', function ($query) {
            $query->where('status', Payment::REJECTED);
        });
    }

    public function scopeReturned(Builder $query): Builder
    {
        return $query->whereHas('payment', function ($query) {
            $query->where('status', Payment::RETURNED);
        });
    }

    /**
     * Relations
     */
    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function copan(): BelongsTo
    {
        return $this->belongsTo(Copan::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Acessors
     */
    public function deliveryStatusReadable(): Attribute
    {
        return new Attribute(
            get: function () {
                switch ($this->attributes['delivery_status']) {
                    case self::NOTSENT:
                        return 'فرستاده نشده';
                        break;

                    case self::SENT:
                        return 'فرستاده شده';
                        break;

                    case self::ISSENDING:
                        return 'درحال ارسال';
                        break;

                    case self::RECEIVED:
                        return 'دریافت شده';
                        break;
                }
            }
        );
    }

    public function orderStatusReadable(): Attribute
    {
        return new Attribute(
            get: function () {
                switch ($this->attributes['order_status']) {
                    case self::WAITING:
                        return 'منتظر تایید';
                        break;

                    case self::ACCEPTED:
                        return 'تایید شده';
                        break;

                    case self::NOTACCEPTED:
                        return 'تایید نشده';
                        break;
                }
            }
        );
    }

    public function deliveryAmountReadable(): Attribute
    {
        return new Attribute(
            get: fn () => fa_price($this->delivery_amount)
        );
    }

    public function orderFinalAmountReadable(): Attribute
    {
        return new Attribute(
            get: fn () => fa_price($this->order_final_amount)
        );
    }

    public function orderDiscountAmountReadable(): Attribute
    {
        return new Attribute(
            get: fn () => fa_price($this->order_discount_amount)
        );
    }

    public function orderCopanDiscountAmountReadable(): Attribute
    {
        return new Attribute(
            get: fn () => fa_price($this->order_copan_discount_amount)
        );
    }
}
