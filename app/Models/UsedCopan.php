<?php

namespace App\Models;

use App\Models\Market\Copan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UsedCopan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','copan_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function copan(): BelongsTo
    {
        return $this->belongsTo(Copan::class);
    }
}
