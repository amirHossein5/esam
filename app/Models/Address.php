<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'city_id', 'province_id', 'postal_code', 'address', 'no', 'unit', 'recipient_first_name', 'recipient_last_name', 'mobile', 'status'];

    /**
     * Relations
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    /**
     * Accessors
     */
    public function recipientFullName(): Attribute
    {
        return new Attribute(
            get: fn () => "{$this->recipient_first_name} {$this->recipient_last_name}"
        );
    }
}
