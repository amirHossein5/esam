<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\FAQCategoryRequest;
use App\Http\Requests\Admin\Content\FAQRequest;
use App\Models\Content\FAQCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FAQCategoryController extends Controller
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
                FAQCategory::query()
                    ->skip(request()->start)
                    ->take(request()->length)
                    ->get()
            )->toJson();
        }

        return view('admin.content.faq-category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content.faq-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FAQCategoryRequest $request)
    {
        FAQCategory::create($request->validated());

        return to_route('admin.content.faqCategory.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ساخته شد');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FAQCategory $faqCategory)
    {
        return view('admin.content.faq-category.edit', compact('faqCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FAQCategoryRequest $request, FAQCategory $faqCategory)
    {
        $faqCategory->update($request->validated());

        return to_route('admin.content.faqCategory.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FAQCategory $faqCategory)
    {
        $faqCategory->delete();

        return to_route('admin.content.faqCategory.index')
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }

    /**
     * Changes status of the resource.
     *
     * @param  \App\Models\Content\FAQCategory  $faqCategory
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(FAQCategory $faqCategory): Response
    {
        $faqCategory->status = !$faqCategory->status;
        $result = $faqCategory->save();

        return $result
            ? response(['checked' => $faqCategory->status])
            : response('', 500);
    }
}
