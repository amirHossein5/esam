<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class SelectableAttributeValue extends Model
{
    use HasFactory, HasEagerLimit;

    protected $fillable = ['selectable_attribute_id', 'value', 'background'];

    public function selectableAttribute(): BelongsTo
    {
        return $this->belongsTo(SelectableAttribute::class);
    }
}
