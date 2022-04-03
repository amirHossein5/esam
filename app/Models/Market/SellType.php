<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellType extends Model
{
    use HasFactory;

    const FIXPRICE = 'fix_price';
    const AUCTION = 'auction';
}
