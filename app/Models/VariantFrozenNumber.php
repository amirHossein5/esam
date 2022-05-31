<?php

namespace App\Models;

use App\Models\Market\ProductVariant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VariantFrozenNumber extends Model
{
    use HasFactory;

    protected $table = 'variant_frozen_number';
    protected $fillable = ['variant_id', 'number', 'cart_item_id'];
    protected $updated_at = false;

    public function variant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class);
    }
}
