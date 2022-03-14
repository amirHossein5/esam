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

class FAQController extends Controller
{
    public function archive(): View
    {
        return view('admin.content.faq.archive.index');
    }

    public function archiveDatatable(): JsonResponse
    {
        return datatables(
            FAQ::select('id', 'question', 'answer', 'status')
                ->onlyTrashed()
        )->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.content.faq.index');
    }

    public function indexDatatable(): JsonResponse
    {
        return datatables(
            FAQ::select('id', 'question', 'answer', 'status')
        )->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content.faq.create');
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

        return redirect()
            ->route('admin.content.faq.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ذخیره شد');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FAQ $faq)
    {
        return view('admin.content.faq.edit', compact('faq'));
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

        return redirect()
            ->route('admin.content.faq.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ویرایش شد');
    }

    public function restore(int $id): RedirectResponse
    {
        FAQ::onlyTrashed()->where('id', $id)->restore();

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت بازگردانی شد');
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

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }

    public function forceDelete(int $id): RedirectResponse
    {
        FAQ::onlyTrashed()->where('id', $id)->forceDelete();

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }

    public function changeStatus(FAQ $faq): Response
    {
        $faq->status = !$faq->status;
        $result = $faq->save();

        return $result
            ? response(['checked' => $faq->status])
            : response('', 500);
    }
}
