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
            // product_category
            [
                "name" => 'product_category_view_any',
                'description' => 'مشاهده دسته بندی محصولات',
            ],

            // product_attribute
            [
                "name" => 'product_attribute_view_any',
                'description' => 'مشاهده فرم کالا',
            ],

            // product
            [
                "name" => 'product_view_any',
                'description' => 'مشاهده  محصولات ',
            ],
            [
                "name" => 'product_archive_view_any',
                'description' => 'مشاهده  محصولات آرشیو شده ',
            ],
            [
                "name" => 'product_change_marketable',
                'description' => ' تغییر امکان فروش محصول',
            ],
            [
                "name" => 'product_delete',
                'description' => 'حذف محصول',
            ],
            [
                "name" => 'product_update',
                'description' => 'ویرایش محصول',
            ],

            // selectable attribute
            [
                "name" => 'selectable_attribute_view_any',
                'description' => 'مشاهده ویژگی های قابل انتخاب ',
            ],

            // order
            [
                "name" => 'order_view_any',
                'description' => 'مشاهده سفارش ها ',
            ],

            // payment
            [
                "name" => 'payment_view_any',
                'description' => 'مشاهده پرداخت ها ',
            ],

            // landingPageCopan
            [
                "name" => 'landing_page_copan_view_any',
                'description' => 'مشاهده کپن های صفحه اصلی ',
            ],

            // copan
            [
                "name" => 'copan_view_any',
                'description' => 'مشاهده کپن ها ',
            ],

            // amazingSale
            [
                "name" => 'amazing_sale_view_any',
                'description' => 'مشاهده تخفیف های شگفت انگیز ',
            ],

            // FAQCategory
            [
                "name" => 'faq_category_view_any',
                'description' => 'مشاهده  دسته بندی سوالات متداول ',
            ],

            // FAQ
            [
                "name" => 'faq_view_any',
                'description' => 'مشاهده  سوالات متداول ',
            ],

            // page
            [
                "name" => 'page_view_any',
                'description' => 'مشاهده پیج ساز ',
            ],

            // banner
            [
                "name" => 'banner_view_any',
                'description' => 'مشاهده بنرها ',
            ],

            // report
            [
                "name" => 'report_view_any',
                'description' => 'مشاهده گزارش ها ',
            ],
            [
                "name" => 'report_toggle_product',
                'description' => 'بازکردن و بستن محصول گزارش شده',
            ],

            // public-mail
            [
                "name" => 'public_mail_view_any',
                'description' => 'مشاهده اطلاعیه ایمیلی',
            ],

            // public-sms
            [
                "name" => 'public_sms_view_any',
                'description' => 'مشاهده اطلاعیه پیامکی',
            ],

            // settings
            [
                "name" => 'setting_view',
                'description' => 'مشاهده تنظیمات',
            ],
        ];

        collect($permissions)->each(function ($permission) {
            Permission::firstOrCreate($permission);
        });
    }
}
