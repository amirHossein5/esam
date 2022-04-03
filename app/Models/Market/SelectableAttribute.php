<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SelectableAttribute extends Model
{
    use HasFactory, HasEagerLimit;

    protected $fillable = ['name'];

    const COLOR = 'رنگ';

    public function values(): HasMany
    {
        return $this->hasMany(SelectableAttributeValue::class);
    }
}
