<?php

namespace App\Http\Controllers\Admin\Content;

use Illuminate\Http\Request;
use App\Models\Content\Banner;
use App\Http\Controllers\Controller;
use AmirHossein5\LaravelImage\Facades\Image;

class BannerController extends Controller
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
                Banner::query()
                    ->skip(request()->start)
                    ->take(request()->length)
                    ->get()
            )->toJson();
        }

        return view('admin.content.banner.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = $request->validate([
            'banner' => 'required|file|image|max:1000',
            'url' => 'required|url'
        ]);

        $request['banner'] = Image::make($request['banner'])
            ->setExclusiveDirectory('banners')
            ->resize('1876', '462')
            ->save(closure: fn ($img) => $img->imagePath);

        if (!$request['banner']) {
            return $this->imageError();
        }

        Banner::create($request);

        return to_route('admin.content.banner.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ذخیره شد');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('admin.content.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $request = $request->validate([
            'banner' => 'nullable|file|image|max:1000',
            'url' => 'required|url'
        ]);

        if (request()->hasFile('banner')) {
            if (Image::rm($banner->banner)) {
                $request['banner'] = Image::make($request['banner'])
                    ->setExclusiveDirectory('banners')
                    ->resize('1876', '462')
                    ->save(closure: fn ($img) => $img->imagePath);

                if (!$request['banner']) {
                    return $this->imageError();
                }
            }
        }

        $banner->update($request);

        return to_route('admin.content.banner.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        Image::rm($banner->banner);

        $banner->delete();

        return to_route('admin.content.banner.index')
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }
}
