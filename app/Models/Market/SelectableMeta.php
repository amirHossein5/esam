<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SelectableMeta extends Model
{
    use HasFactory, HasEagerLimit;

    protected $fillable = ['name'];

    public function values(): HasMany
    {
        return $this->hasMany(SelectableMetaValue::class);
    }
}
