<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
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
                Support::answers()
                    ->skip(request()->start)
                    ->take(request()->length)
                    ->get()
            )->toJson();
        }

        return view('admin.support.index');
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

    public function changeStatus(Page $page)
    {
        $page->status = !$page->status;
        $result = $page->save();

        return $result
            ? response(['checked' => $page->status])
            : response('', 500);
    }
}

