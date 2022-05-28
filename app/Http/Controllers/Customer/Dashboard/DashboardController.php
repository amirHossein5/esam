<?php

namespace App\Http\Controllers\Customer\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DeliveryTime;
use App\Models\Market\Order;
use App\Models\User;
use App\Models\UserFavoriteProduct;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.dashboard.index');
    }

    /**
     * Increases cash of user.
     *
     * @return \Illuminate\Http\Response
     */
    public function enhanceCash(Request $request)
    {
        $request = $request->validate([
            'cash' => 'required|numeric|min:100'
        ]);

        User::where('id', auth()->id())->increment('cash', $request['cash']);

        return back()->with('sweetalert-mixin-success', 'با موفقیت افزوده شد');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myOrders()
    {
        $orders = Order::where('user_id', auth()->id())
            ->with('items.product')
            ->paginate(6);

        return view('customer.dashboard.my-orders', compact('orders'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function favoriteSellers()
    {
        $sellers = auth()->user()->favoriteSellers()->paginate(6);

        return view('customer.dashboard.favorite-sellers', compact('sellers'));
    }

    /**
     * Destroy a resource.
     *
     * @param \App\Models\User $seller
     * @return \Illuminate\Http\Response
     */
    public function destroyFavoriteSeller(User $seller)
    {
        auth()->user()->favoriteSellers()->detach($seller->id);

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function favorites()
    {
        $favoriteProducts = auth()->user()->favoriteProducts()->with(['product.variants', 'product.amazingSale', 'product.auction'])->paginate(6);

        return view('customer.dashboard.favorites', compact('favoriteProducts'));
    }

    /**
     * Destroy a specific item.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyFavorite(UserFavoriteProduct $userFavoriteProduct)
    {
        //gate

        $userFavoriteProduct->delete();

        return back()->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function account()
    {
        $delievryTimes = DeliveryTime::all();

        return view('customer.dashboard.account', compact('delievryTimes'));
    }

    /**
     * Update a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editAccount(Request $request)
    {
        $request = $request->validate([
            'first_name' => 'nullable|min:2|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
            'last_name' => 'nullable|min:2|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
            'mobile' => ['nullable', 'numeric', Rule::unique('users', 'mobile')->ignore(auth()->id())],
            'delivery_time_id' => 'required|numeric|exists:delivery_times,id',
            'email' => ['required', Rule::unique('users', 'email')->ignore(auth()->id()), 'email'],
        ]);

        User::where('id', auth()->id())
            ->update($request);

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت ویرایش شد');
    }
}
