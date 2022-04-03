<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    use HasFactory;

    protected $fillable = ['price', 'has_request_for_discount', 'sold_number', 'marketable_number', 'frozen_number'];
}
