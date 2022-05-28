<?php

namespace App\Repositories;

use App\Models\Market\ProductCategory;

class ProductCategoryRepository
{
    const KEY = 'ProductCategory_parents_where_show_in_menu_1_with_active_children';

    public function all()
    {
        return cache()->remember(self::KEY, now()->addHour(), fn() =>
            ProductCategory::activeInMenu()
                ->whereNull('parent_id')
                ->with(['children' => fn($query) =>
                    $query->where('show_in_menu', ProductCategory::ACTIVE)
                ])->get()
        );
    }
}
