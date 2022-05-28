<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Market\Product;
use App\Models\ProductQuestion;
use Illuminate\Http\Request;

class ProductQuestionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('customer.products.question.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Market\Product  $product
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $request = $request->validate([
            'text' => 'required|string|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
        ]);

        $product->questions()->create([
            'user_id' => auth()->id(),
            'text' => $request['text']
        ]);

        return to_route('customer.product.item', [$product->id, $product->slug])
            ->with('sweetalert-mixin-success', 'با موفقیت ثبت شد.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductQuestion $question
     * @param \App\Models\Market\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductQuestion $question, Product $product)
    {
        return view('customer.products.question.edit', compact('product', 'question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductQuestion $question
     * @param \App\Models\Market\Product $product     *
     *  @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductQuestion $question, Product $product)
    {
        $request = $request->validate([
            'text' => 'required|string|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
        ]);

        $question->update($request);

        return to_route('customer.product.item', [$product->id, $product->slug])
            ->with('sweetalert-mixin-success', 'با موفقیت ثبت شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductQuestion $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductQuestion $question)
    {
        $question->delete();

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }
}
