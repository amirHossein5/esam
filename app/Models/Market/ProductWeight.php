<?php

namespace App\Models\Market;

use App\Casts\ToEnglishMoney;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductWeight extends Model
{
    use HasFactory;

    protected $casts = ['delivery_amount' => ToEnglishMoney::class];
}
