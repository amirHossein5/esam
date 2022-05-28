<?php

namespace App\Repositories;

use App\Models\Content\FAQCategory;

class FAQRepository
{
    const KEY = 'faq_categories_actives_with_5_faqs';

    public function get()
    {
        return cache()->remember(self::KEY, now()->addHours(24), function () {
            return FAQCategory::actives()
                ->with(['faqs' => fn ($query) => $query->actives()->take(5)])
                ->get();
        });
    }
}
