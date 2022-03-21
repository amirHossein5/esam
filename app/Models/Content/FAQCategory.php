<?php

namespace App\Models\Content;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQCategory extends Model
{
    use HasFactory;

    protected $table = 'faq_categories';

    protected $fillable = ['name', 'status'];
    
    // status
    const DISABLE = 0;
    const ENABLE = 1;
}
