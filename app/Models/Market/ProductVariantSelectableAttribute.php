<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariantSelectableAttribute extends Model
{
    use HasFactory;

    protected $fillable = ['variant_id', 'attribute_id', 'value_id', 'value'];

    /**
     * Relations
     */
    public function variant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class);
    }

    public function attribute(): BelongsTo
    {
        return $this->belongsTo(SelectableAttribute::class);
    }

    public function valueRelation(): BelongsTo
    {
        return $this->belongsTo(SelectableAttributeValue::class);
    }
}
