<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Permissionseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // post-categories
            [
                "name" => 'post_categories_view_any',
                'description' => 'مشاهده دسته بندی پست ها',
            ],
            [
                "name" => 'post_categories_create',
                'description' => 'ساخت دسته بندی پست ها',
            ],
            [
                "name" => 'post_categories_update',
                'description' => 'ویرایش دسته بندی پست ها',
            ],
            [
                "name" => 'post_categories_delete',
                'description' => 'حذف دسته بندی پست ها',
            ],
            [
                "name" => 'post_categories_restore',
                'description' => 'بازیابی دسته بندی پست ها',
            ],
            [
                "name" => 'post_categories_force_delete',
                'description' => 'حذف کامل دسته بندی پست ها',
            ],

            // posts
            [
                "name" => 'posts_view_any',
                'description' => 'مشاهده بخش پست ها',
            ],
            [
                "name" => 'posts_view',
                'description' => 'مشاهده  فقط پست های خود',
            ],
            [
                "name" => 'posts_view_all',
                'description' => 'مشاهده  همه پست ها',
            ],
            [
                "name" => 'posts_create',
                'description' => 'ساخت پست ',
            ],
            [
                "name" => 'posts_update',
                'description' => 'ویرایش پست ',
            ],
            [
                "name" => 'posts_delete',
                'description' => 'حذف پست ',
            ],
            [
                "name" => 'posts_restore',
                'description' => 'بازیابی پست ',
            ],
            [
                "name" => 'posts_force_delete',
                'description' => 'حذف کامل پست ',
            ],
        ];

        collect($permissions)->each(function ($permission) {
            Permission::firstOrCreate($permission);
        });
    }
}
