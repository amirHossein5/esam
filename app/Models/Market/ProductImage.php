<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = ['image'];

    protected $casts = ['image' => 'array'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
