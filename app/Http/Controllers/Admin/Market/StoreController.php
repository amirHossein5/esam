<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->wantsJson()) {
            return datatables(
                Product::select('id', 'name', 'image', 'marketable_number', 'frozen_number', 'sold_number')
                    ->marketable()
                    ->skip(request()->start)
                    ->take(request()->length)
                    ->get()
            )->toJson();
        }

        return view('admin.market.store.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToStore(Product $product)
    {
        return view('admin.market.store.add-to-store', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $request = $request->validate([
            'marketable_number' => 'required|numeric|min:1',
            'description' => 'nullable|string|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
            'receiver' => 'required|string|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
            'deliverer' => 'required|string|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui'
        ]);

        Log::info(
            "Receiver => {$request['receiver']},
            deliverer => {$request['deliverer']},
            description => {$request['description']},
            added => {$request['marketable_number']}"
        );

        $product->increment('marketable_number', $request['marketable_number']);

        return redirect()
            ->route('admin.market.store.index')
            ->with('sweetalert-mixin-success', 'با موفقیت اضافه شد');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.market.store.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request = $request->validate([
            'marketable_number' => 'required|numeric|min:1',
            'frozen_number' => 'required|numeric|min:0',
            'sold_number' => 'required|numeric|min:0',
        ]);

        $product->update($request);

        return redirect()
            ->route('admin.market.store.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ویرایش شد');
    }
}
