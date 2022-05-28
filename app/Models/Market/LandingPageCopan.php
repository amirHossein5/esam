<?php

namespace App\Models\Market;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LandingPageCopan extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'status', 'copan_id', 'start_date', 'end_date'];

    protected $casts = ['image' => 'array'];

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
     * Relations
     */
    public function copan(): BelongsTo
    {
        return $this->belongsTo(Copan::class);
    }

    /**
     * Scopes
     */
    public function scopeActives($query): Builder
    {
        return $query->where('status', 1)
            ->where('end_date', '>=' ,now())
            ->where('start_date', '<=', now())
            ->whereHas('copan', fn ($query) =>
                $query->where('end_date', '>=' ,now())
                    ->where('start_date', '<=', now())
            );
    }

    /**
     * Accessors
     */

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
