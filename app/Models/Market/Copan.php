<?php

namespace App\Models\Market;

use App\Casts\ToEnglishDigits;
use App\Casts\ToEnglishMoney;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Copan extends Model
{
    use HasFactory;

    /**
     * amount_type
     */
    const PERCENTAGE = 0;
    const PRICEUNIT = 1;

    /**
     * type
     */
    const PUBLIC = 0;
    const PRIVATE = 1;

    protected $fillable = ['code', 'amount', 'amount_type', 'discount_ceiling', 'type', 'status', 'start_date', 'end_date', 'user_id'];

    protected $casts = ['discount_ceiling' => ToEnglishDigits::class, 'amount' => ToEnglishMoney::class];

    /**
     * Appends to accessors.
     *
     * @var array
     */
    protected $appends = [
        'start_date_jalali',
        'end_date_jalali',
        'type_readable',
        'amount_type_readable',
        'amount_readable',
        'discount_ceiling_readable',
    ];

    /**
     * Relations
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
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

    public function discountCeilingReadable(): Attribute
    {
        return new Attribute(
            get: fn () => fa_price($this->discount_ceiling)
        );
    }

    /**
     * Return amount_type by human language.
     *
     * @return string
     */
    public function amountTypeReadable(): Attribute
    {
        return new Attribute(
            get: fn () => $this->amount_type == self::PERCENTAGE
                ? 'درصد'
                : 'تومان'
        );
    }

    /**
     * Return type by human language.
     *
     * @return string
     */
    public function typeReadable(): Attribute
    {
        return new Attribute(
            get: fn() => $this->type == self::PUBLIC
                ? 'عمومی'
                : 'خصوصی'
        );
    }

    /**
     * Converts start_date to jalali for being searchable in datatable.
     *
     * @return string
     */
    public function startDateJalali(): Attribute
    {
        return new Attribute(
            get: fn () => (string) jdate($this->start_date)
        );
    }

    /**
     * Converts end_date to jalali for being searchable in datatable.
     *
     * @return string
     */
    public function endDateJalali(): Attribute
    {
        return new Attribute(
            get: fn () => (string) jdate($this->end_date)
        );
    }
}
