<?php

namespace App\Providers;

use App\Models\Content\FAQCategory;
use App\Models\Market\LandingPageCopan;
use App\Models\Market\ProductCategory;
use App\Models\Notification;
use App\Models\Setting;
use App\Repositories\FAQRepository;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\SettingRepository;
use App\Services\DiscountService;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('admin.layouts.header', function ($view) {
            $view->with('unseenNotifications', Notification::unseen()->get());
        });

        view()->composer('customer.layouts.footer', function ($view) {

            $faqCategories = (new FAQRepository)->get();

            $randomFaqs = collect($faqCategories)
                ->pluck('faqs')
                ->flatten()
                ->shuffle()
                ->take(4);

            $view->with('randomFaqs', $randomFaqs);
        });

        view()->composer('customer.layouts.*', function ($view) {
            $view->with('setting', (new SettingRepository)->first());
        });

        view()->composer('customer.layouts.header', function ($view) {
            $view->with('productCategories', (new ProductCategoryRepository)->all());
        });

        view()->composer('customer.layouts.discount', function ($view) {
            $view->with('landingPageCopan', LandingPageCopan::actives()->first());
        });

        view()->composer(['customer.payment.address', 'customer.payment.code', 'customer.payment.pay', 'customer.cart'], function ($view) {
            $cartItems = auth()->user()->cartItems()->with('product.amazingSale', 'variant.selectableAttributes.attribute')->get();

            $totalAmount = 0;
            $totalDiscountAmount = 0;
            $totalDeliveryAmount = 0;
            $finalAmount = 0;

            $cartItems->map(function ($item) use (&$finalAmount, &$totalAmount, &$totalDeliveryAmount, &$totalDiscountAmount) {
                $totalAmount += $item->variant->price * $item->number;
                $totalDeliveryAmount += $item->product->delivery_amount;

                if ($item->product->amazingSale?->isActive) {
                    $discountService = (new DiscountService);

                    $totalDiscountAmount += $discountService->getDiscount(
                        $item->variant->price,
                        $item->product->amazingSale->percentage
                    ) * $item->number;
                    $finalAmount += $discountService->calculate(
                        $item->variant->price,
                        $item->product->amazingSale->percentage
                    ) * $item->number;
                } else {
                    $finalAmount += $item->variant->price * $item->number;
                }
            });

            $finalAmount += $totalDeliveryAmount;

            $view->with([
                'finalAmount' => $finalAmount,
                'totalDeliveryAmount' => $totalDeliveryAmount,
                'totalAmount' => $totalAmount,
                'totalDiscountAmount' => $totalDiscountAmount,
                'totalProductNumber' => $cartItems->sum('number')
            ]);
        });
    }
}
