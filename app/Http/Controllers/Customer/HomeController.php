<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Content\Banner;
use App\Models\Market\Auction;
use App\Models\Market\Product;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\SettingRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = (new SettingRepository)
            ->first();
        $banners = Banner::all();

        $discountedProducts = Product::actives()
            ->whereHas('amazingSale', fn ($query) => $query->actives())
            ->whereHas('variants')
            ->inRandomOrder()
            ->take(13)
            ->with('variants', 'amazingSale')
            ->get();

        $lastRemainingAuctions = Product::actives()
            ->whereHas('auction', fn ($query) => $query->actives())
            ->orderBy(
                Auction::select('end_date')
                    ->whereColumn('auctions.product_id', 'products.id')
                    ->orderBy('end_date')
                    ->take(1)
            )->take(13)
            ->with('auction.suggestions:id,auction_id,suggested_amount')
            ->get();

        $mostVisited = Product::actives()
            ->orderByDesc('visitors')
            ->take(13)
            ->with('auction', 'variants')
            ->get();

        $hotAuctions = Product::actives()
            ->whereHas('auction', fn ($query) => $query->actives()->whereHas('suggestions'))
            ->with('auction.suggestions')
            ->orderByDesc(
                Auction::select([])
                    ->whereColumn('auctions.product_id', 'products.id')
                    ->withCount('suggestions')
            )
            ->take(13)
            ->get();

        // reject if not exists
        $mostVisited = collect($mostVisited)
            ->filter(fn ($product) =>
                $product->variants->isNotEmpty() ? $product->variants->where('marketable_number', '>', '0')->isNotEmpty() : true
            );
        $discountedProducts = collect($discountedProducts)
            ->filter(fn ($product) =>
                $product->variants->isNotEmpty() ? $product->variants->where('marketable_number', '>', '0')->isNotEmpty() : true
            );

        return view('customer.index', compact('setting', 'banners', 'hotAuctions', 'mostVisited', 'lastRemainingAuctions', 'discountedProducts'));
    }
}
