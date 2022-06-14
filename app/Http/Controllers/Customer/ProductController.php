<?php

namespace App\Http\Controllers\Customer;

use App\Events\AuctionSuggestionSubmittedEvent;
use App\Http\Controllers\Controller;
use App\Models\Market\Auction;
use App\Models\Market\Product;
use App\Models\Market\ProductCategory;
use App\Models\Market\ProductVariant;
use App\Models\Market\SellType;
use App\Models\Report;
use App\Models\User;
use App\Models\UserFavoriteProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Show specific item of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, string $slug)
    {
        if ($product->slug != $slug or !$product->isActive) {
            abort(404);
        }

        // add visitor
        if (auth()->check()) {
            $product->visitors = $product->visitors + 1;
            $product->save();
        }

        $product->load('variants.selectableAttributes.attribute:id,name', 'questions.user', 'attributeValues.attribute', 'galleries', 'productCategory.parent', 'amazingSale');
        $product->load(['auction.suggestions' => fn ($q) => $q->orderByDesc('suggested_amount')]);

        $categories = $this->getNestedCategoryNames(
            collect($product->productCategory)->toArray()
        );

        $attributeValuesByAttribute = $product->attributeValues->groupBy('attribute.name')->toArray();
        $relatedProducts = Product::actives()
            ->where('category_id', $product->category_id)
            ->orderByDesc('visitors')
            ->take(13)
            ->with('auction.suggestions:id,auction_id,suggested_amount', 'variants', 'amazingSale')
            ->get();
        $relatedProducts = collect($relatedProducts)->filter(fn ($product) =>
            $product->variants->isNotEmpty() ? $product->variants->where('marketable_number', '>', '0')->isNotEmpty() : true
        )->reject(fn ($related) => $related->id === $product->id);

        return view('customer.products.show', compact('product', 'categories', 'attributeValuesByAttribute', 'relatedProducts'));
    }

    /**
     * Serch for items of the resource.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // categories
        $categories = ProductCategory::select('id', 'name');
        if ($parent_id = $request->get('category')) {
            $categories->where('parent_id', $parent_id);
        } else {
            $categories->where('parent_id', null);
        }
        $categories = $categories->get();

        $breadcrumbCategories = [];
        if ($request->filled('category')) {
            $breadcrumbCategories = ProductCategory::select('id', 'name', 'parent_id')
                ->whereId($request->get('category'))
                ->with('parent')
                ->first();
        }

        //attributes
        $productAttributes = [];

        if ($request->get('category')) {
            $productCategory = ProductCategory::whereId($request->get('category'))
                ->with(['attributes.defaultValues'])
                ->first();

            $productAttributes = $productCategory->attributes;
        }

        // filters
        $filteredProducts = Product::actives();

        // filter by category
        if (request()->filled('category')) {
            $filteredProducts->whereCategoryId(request()->get('category'));
        }

        // filter by sell type
        if (request()->filled('sell-type')) {
            if (request()->get('sell-type') == 'typical') {
                $sellTypeId = SellType::whereName(SellType::FIXPRICE)->value('id');
                $filteredProducts->whereSellTypeId($sellTypeId);
            } elseif (request()->get('sell-type') == 'auction') {
                $sellTypeId = SellType::whereName(SellType::AUCTION)->value('id');
                $filteredProducts->whereSellTypeId($sellTypeId);
            }
        }

        // filter by keywords
        if (request()->filled('kw')) {
            $filteredProducts->where(function ($q) {
                $q->where('name', 'like', "%" . request()->kw . "%");
                $q->orWhere('introduction', 'like', "%" . request()->kw . "%");
                $q->orWhere('description', 'like', "%" . request()->kw . "%");
            });
        }

        // filter by free delivery
        if (request()->has('free-delivery')) {
            $filteredProducts->freeDelivery();
        }

        // filter by has discount
        if (request()->has('has-discount')) {
            $filteredProducts->whereHas('amazingSale', fn ($q) => $q->actives() );
        }

        // filter by price
        if (request()->filled('price-from') and request()->filled('price-until')) {
            $filteredProducts->whereHas('variants' , fn ($q) =>
                $q->whereActive(1)
                    ->limit(1)
                    ->whereBetween('price', [request()->get('price-from'), request()->get('price-until')])
            );
        } elseif (request()->filled('price-from')) {
            $filteredProducts->whereHas('variants' , fn ($q) =>
                $q->whereActive(1)
                    ->limit(1)
                    ->where('price', '>=', request()->get('price-from'))
            );
        } elseif (request()->filled('price-until')) {
            $filteredProducts->whereHas('variants' , fn ($q) =>
                $q->whereActive(1)
                    ->limit(1)
                    ->where('price', '<=', request()->get('price-until'))
            );
        }

        // filter by active auction
        if (request()->filled('active-auctions')) {
            $filteredProducts->whereHas('auction', fn ($query) => $query->actives());
        }

        // filter by existing products
        if (request()->filled('product-exists')) {
            $filteredProducts->whereHas('variants', fn ($q) =>
                $q->whereActive(1)
                    ->where('marketable_number', '>', '0')
            );
        }

        // filter by attribute-values
        if (request()->filled('attribute-values') and request()->filled('attributes')) {
            $attributes = explode(',', request()->get('attributes'));
            $values = explode(',', request()->get('attribute-values'));

            if (count($attributes) === count($values)) {
                // when an attribute has multiple value ids, put value ids to array
                // attribute id => [ valueids ]
                foreach (array_squish(array_combine($values, $attributes)) as $attribute => $value) {
                    if (is_array($value)) {
                        $filteredProducts->whereHas('attributeValues', fn($q) =>
                            $q->where('attribute_id', $attribute)
                                ->where(function ($q) use ($value) {
                                    foreach ($value as $value) {
                                        $q->orWhere('value_id', $value);
                                    }
                                })
                        );
                    } else {
                        $filteredProducts->whereHas('attributeValues', fn($q) =>
                            $q->where('attribute_id', $attribute)->where('value_id', (int) $value)
                        );
                    }
                }
            }
        }

        // sort
        $filteredProducts->addSelect(['price' =>
            ProductVariant::select('price')
                ->whereColumn('products.id', 'product_variants.product_id')
                ->whereActive(1)
                ->take(1)
        ]);

        if (request()->filled('sort')) {
            if (request()->sort == 'oldest') {
                $filteredProducts->orderBy('updated_at');
            } elseif (request()->sort == 'newest') {
                $filteredProducts->orderByDesc('updated_at');
            } elseif (request()->sort == 'least-expensive') {
                $filteredProducts->orderBy('price');
            } elseif (request()->sort == 'most-expensive') {
                $filteredProducts->orderByDesc('price');
            } elseif (request()->sort == 'last-remaining-auctions') {
                $filteredProducts->orderBy(
                    Auction::select('end_date')
                        ->whereColumn('auctions.product_id', 'products.id')
                        ->orderBy('end_date')
                        ->take(1)
                );
            }
        }

        $filteredProducts = $filteredProducts
            ->with('auction.suggestions:id,auction_id,suggested_amount', 'variants', 'amazingSale')
            ->paginate(7);

        return view('customer.products.search', compact('categories', 'productAttributes', 'filteredProducts', 'breadcrumbCategories'));
    }

    /**
     * The form of autcion suggestion.
     *
     * @param \App\Models\Market\Product $product
     * @return \Illuminate\Http\Response
     */
    public function suggestionForm(Product $product)
    {
        if (!$product->isActive or !$product->auction->isActive) {
            abort(404);
        }

        $product->load(['auction.suggestions' => fn ($q) => $q->orderByDesc('suggested_amount')]);

        return view('customer.products.suggestion-form', compact('product'));
    }

    /**
     * Submits new suggestions for auction.
     *
     * @param \Illuminate\Http\Request  $request
     * @param \App\Models\Market\Product $product
     * @return \Illuminate\Http\Response
     */
    public function submitSuggestion(Request $request, Product $product)
    {
        if (!$product->isActive or !$product->auction->isActive) {
            abort(404);
        }

        $min = number_format(
            $product
                ->auction
                ->suggestions()
                ->selectRaw('max(suggested_amount) as max_suggested_amount')
                ->first()
                ->max_suggested_amount, 0, '.', ''
            );

        $request = $request->validate([
            'suggested_amount' => "required|numeric|gt:$min"
        ]);

        auth()->user()->auctionSuggestions()->create($request + [
            'auction_id' => $product->auction->id
        ]);

        event(new AuctionSuggestionSubmittedEvent($product, $request['suggested_amount']));

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت ثبت شد');
    }

    /**
     * Adds/removes user favorite products.
     *
     * @param \App\Models\Market\Product $product
     * @return \Illuminate\Http\Response
     */
    public function addToFavorites(Product $product)
    {
        if (auth()->user()->favoriteProducts()->where('product_id', $product->id)->exists()) {
            auth()->user()->favoriteProducts()->where('product_id', $product->id)->delete();
        } else {
            auth()->user()->favoriteProducts()->create([
                'product_id' => $product->id
            ]);
        }

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت افزوده شد');
    }

    /**
     * Follows the auction.
     *
     * @param \App\Models\Market\Product $product
     * @return \Illuminate\Http\Response
     */
    public function followAuction(Product $product)
    {
        if (!$product->auction()->exists()) {
            abort(404);
        }

        $currentlyExists = auth()->user()->followingAuctions()->where('auction_id', $product->auction->id)->exists();

        if (!$currentlyExists) {
            auth()->user()->followingAuctions()->attach($product->auction->id);
        }

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت دنبال شد');
    }

    /**
     * Unfollows the auction.
     *
     * @param \App\Models\Market\Product $product
     * @return \Illuminate\Http\Response
     */
    public function UnFollowAuction(Product $product)
    {
        auth()->user()->followingAuctions()->detach($product->auction->id);

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت غیرفعال شد');
    }

    /**
     * Adds favorite seller.
     *
     * @return \Illuminate\Http\Response
     */
    public function toggleFavoriteSeller(User $seller)
    {
        if (auth()->user()->favoriteSellers()->wherePivot('seller_id', $seller->id)->exists()) {
            auth()->user()->favoriteSellers()->detach($seller->id);
        } else {
            auth()->user()->favoriteSellers()->attach($seller->id);
        }

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت تغییر کرد');
    }

    /**
     * Store a resource.
     *
     * @param \App\Models\Market\Product $product
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request, Product $product)
    {
        $request = $request->validate([
            'title' => ['required', Rule::in(array_keys(Report::TITLES))],
            'name' => 'required|max:30|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
            'email' => 'required|email',
            'description' => 'required|string'
        ]);

        Report::create($request + ['product_id' => $product->id]);

        return response(['message' => ' با موفقیت گزارش شد.']);
    }

    /**
     * Returns parent names and product category name itself.
     *
     * @param array $collection
     * @return array
     */
    private function getNestedCategoryNames(array $collection): array
    {
        $names = [];
        $names[] = $collection['name'];

        if (isset($collection['parent'])) {
            $names[] = $this->getNestedCategoryNames($collection['parent']);
        }

        return collect($names)->flatten()->toArray();
    }
}
