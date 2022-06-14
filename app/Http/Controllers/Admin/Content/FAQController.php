<?php

namespace App\Http\Controllers\Admin\Content;

use Illuminate\View\View;
use App\Models\Content\FAQ;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Mews\Purifier\Facades\Purifier;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\Content\FAQRequest;
use Illuminate\Support\Facades\DB;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->wantsJson()) {
            $faqs = FAQ::query()
                ->with('faqCategory');
            $count = $faqs->count();

            return datatables(
                $faqs
                    ->skip(request()->start)
                    ->take(request()->length)
                    ->get()
            )->setTotalRecords($count)->skipPaging()->toJson();
        }

        return view('admin.content.faq.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faqCategories = DB::table('faq_categories')->get();

        return view('admin.content.faq.create', compact('faqCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FAQRequest $request)
    {
        $request = $request->validated();
        $request['answer'] = Purifier::clean($request['answer']);

        FAQ::create($request);

        return to_route('admin.content.faq.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ساخته شد');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FAQ $faq)
    {
        $faqCategories = DB::table('faq_categories')->get();

        return view('admin.content.faq.edit', compact('faq', 'faqCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FAQRequest $request, FAQ $faq)
    {
        $request = $request->validated();
        $request['answer'] = Purifier::clean($request['answer']);

        $faq->update($request);

        return to_route('admin.content.faq.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FAQ $faq)
    {
        $faq->delete();

        return to_route('admin.content.faq.index')
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }

    /**
     * Changes status of the resource.
     *
     * @param  \App\Models\Content\FAQ  $faq
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(FAQ $faq): Response
    {
        $faq->status = !$faq->status;
        $result = $faq->save();

        return $result
            ? response(['checked' => $faq->status])
            : response('', 500);
    }
}
