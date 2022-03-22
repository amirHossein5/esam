<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class SelectableMetaValue extends Model
{
    use HasFactory, HasEagerLimit;

    protected $fillable = ['selectable_meta_id', 'value'];

    public function meta(): BelongsTo
    {
        return $this->belongsTo(SelectableMeta::class);
    }
}
