<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AmazingSale extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'percentage', 'status', 'start_date', 'end_date'];

    /**
     * Appends to accessors.
     *
     * @var array
     */
    protected $appends = [
        'start_date_jalali',
        'end_date_jalali',
    ];

    /**
     * Carbon dates
     *
     * @var array
     */
    protected $dates = ['end_date', 'start_date',];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
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
