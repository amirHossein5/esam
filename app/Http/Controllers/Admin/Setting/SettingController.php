<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Models\Setting;
use Mews\Purifier\Facades\Purifier;
use App\Http\Controllers\Controller;
use AmirHossein5\LaravelImage\Facades\Image;
use App\Http\Requests\Admin\SettingRequest;
use Database\Seeders\SettingsSeeder;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!$setting = Setting::first()) {
            (new SettingsSeeder())->run();
            $setting = Setting::first();
        }

        return view('admin.setting.index', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request)
    {
        $request = $request->validated();

        if (isset($request['logo'])) {
            $request['logo'] = Image::raw($request['logo'])
                ->be('logo.png')
                ->in('')
                ->replace(false, function ($image) {
                    return $image->imagePath;
                });
            if (!$request['logo']) {
                return $this->imageError();
            }
        }
        if (isset($request['icon'])) {
            $request['icon'] = Image::raw($request['icon'])
                ->be('icon.png')
                ->in('')
                ->replace(false, function ($image) {
                    return $image->imagePath;
                });
            if (!$request['icon']) {
                return $this->imageError();
            }
        }

        $request['description'] = Purifier::clean($request['description']);

        Setting::first()->update($request);

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت ویرایش شد');
    }
}
