<?php

namespace App\Models;

use App\Models\Market\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    use HasFactory;

    /** report titles */
    const TITLES = [
        'کالا ممنوع است', 'کالا غیر مجاز است', 'عکس کالا برخلاف شئونات است', 'عکس با کالا نامرتبط است', 'کالای تکراری ثبت شده است', 'عنوان دارای عناوین تبلیغاتی است'
    ];

    protected $fillable = ['product_id', 'title', 'name', 'email', 'description'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
