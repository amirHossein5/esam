<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\AmazingSaleRequest;
use App\Models\Market\AmazingSale;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class AmazingSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->wantsJson()) {
            $amazingSales = AmazingSale::with('product:id,name');
            $count = $amazingSales->count();

            return datatables(
                    $amazingSales->skip(request()->start)
                    ->take(request()->length)
                    ->get()
            )->setTotalRecords($count)->skipPaging()->toJson();
        }

        return view('admin.market.discount.amazing-sale.index');
    }

    /**
     * Create a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $auctions = DB::table('auctions')->get(['product_id'])->pluck('product_id')->toArray();
        $products = DB::table('products')
            ->get(['name', 'id'])
            ->reject(fn ($product) => in_array($product->id, $auctions));


        return view('admin.market.discount.amazing-sale.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AmazingSaleRequest $request)
    {
        $request = $request->validated();

        $request['start_date'] = substr($request['start_date'], 0, 10);
        $request['start_date'] = date('Y-m-d H:i:s', $request['start_date']);
        $request['end_date'] = substr($request['end_date'], 0, 10);
        $request['end_date'] = date('Y-m-d H:i:s', $request['end_date']);

        AmazingSale::create($request);

        return redirect()
            ->route('admin.market.discount.amazingSale.index')
            ->with('sweetalert-mixin-success', 'با موفقیت اضافه شد');
    }

    /**
     * Edit a listing of the resource.
     *
     * @param \App\Models\Market\AmazingSale $amazingSale
     * @return \Illuminate\Http\Response
     */
    public function edit(AmazingSale $amazingSale)
    {
        $auctions = DB::table('auctions')->get(['product_id', 'id'])->pluck('product_id')->toArray();
        $products = DB::table('products')
            ->get(['name', 'id'])
            ->reject(fn ($product) => in_array($product->id, $auctions));


        return view('admin.market.discount.amazing-sale.edit', compact('amazingSale', 'products'));
    }

    /**
     * Update a created resource in storage.
     *
     * @param \App\Models\Market\AmazingSale $amazingSale
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(AmazingSaleRequest $request, AmazingSale $amazingSale)
    {
        $request = $request->validated();

        $request['start_date'] = substr($request['start_date'], 0, 10);
        $request['start_date'] = date('Y-m-d H:i:s', $request['start_date']);
        $request['end_date'] = substr($request['end_date'], 0, 10);
        $request['end_date'] = date('Y-m-d H:i:s', $request['end_date']);

        $amazingSale->update($request);

        return redirect()
            ->route('admin.market.discount.amazingSale.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ویرایش شد');
    }

    /**
     * Delete a resource.
     *
     * @param \App\Models\Market\AmazingSale $amazingSale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(AmazingSale $amazingSale)
    {
        $amazingSale->delete();

        return redirect()
            ->route('admin.market.discount.amazingSale.index')
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }

    /**
     * Changes status of resource.
     *
     * @param \App\Models\Market\AmazingSale $amazingSale
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(AmazingSale $amazingSale): Response
    {
        $amazingSale->status = !$amazingSale->status;
        $result = $amazingSale->save();

        return $result
            ? response(['checked' => $amazingSale->status])
            : response('', 500);
    }
}
