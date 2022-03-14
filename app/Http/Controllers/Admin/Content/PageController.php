<?php

namespace App\Http\Controllers\Admin\Content;

use Illuminate\View\View;
use App\Models\Content\Page;
use Illuminate\Http\JsonResponse;
use Mews\Purifier\Facades\Purifier;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\Content\PageRequest;

class PageController extends Controller
{
    public function archive(): View
    {
        return view('admin.content.page.archive.index');
    }

    public function archiveDatatable(): JsonResponse
    {
        return datatables(
            Page::select('id', 'title', 'slug', 'status')
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
        return view('admin.content.page.index');
    }

    public function indexDatatable(): JsonResponse
    {
        return datatables(
            Page::select('id', 'title', 'slug', 'status')
        )->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        $request = $request->validated();
        $request['body'] = Purifier::clean($request['body']);
        Page::create($request);

        return redirect()
            ->route('admin.content.page.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ساخته شد');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.content.page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, Page $page)
    {
        $request = $request->validated();
        $request['body'] = Purifier::clean($request['body']);
        
        $page->update($request);

        return redirect()
            ->route('admin.content.page.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ویرایش شد');
    }

    public function restore(int $id): RedirectResponse
    {
        Page::onlyTrashed()->where('id', $id)->restore();

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت بازگردانی شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }

    public function forceDelete(int $id): RedirectResponse
    {
        Page::onlyTrashed()->where('id', $id)->forceDelete();

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }

    public function changeStatus(Page $page)
    {
        $page->status = !$page->status;
        $result = $page->save();

        return $result
            ? response(['checked' => $page->status])
            : response('', 500);
    }
}
