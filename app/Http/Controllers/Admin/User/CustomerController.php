<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use AmirHossein5\LaravelImage\Facades\Image;
use App\Http\Requests\Admin\User\StoreCustomerRequest;
use App\Http\Requests\Admin\User\UpdateCustomerRequest;
use App\Models\DeliveryTime;
use Illuminate\Http\Response;

class CustomerController extends Controller
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
                User::select('id', 'email', 'mobile', 'first_name', 'last_name', 'status')
                    ->customers()
            )->toJson();
        }

        return view('admin.user.customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        $request = $request->validated();
        $request['password'] = bcrypt($request['password']);

        if (isset($request['profile_photo_path'])) {
            $avatar = Image::make($request['profile_photo_path'])
                ->setExclusiveDirectory('user')
                ->autoResize()
                ->save(false, fn ($image) => $image->imagePath);

            if (!$avatar) {
                return back()
                    ->withInput()
                    ->withErrors(['profile_photo_path' => __('validation-inline.uploaded')]);
            }

            $request['profile_photo_path'] = $avatar;
        }

        $delivery_time_id = DeliveryTime::first()->id;

        User::create($request + ['user_type' => 0, 'delivery_time_id' => $delivery_time_id]);

        return redirect()
            ->route('admin.user.customer.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ساخته شد.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $customer)
    {
        return view('admin.user.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, User $customer)
    {
        $request = $request->validated();

        if (isset($request['profile_photo_path'])) {
            if ($customer->profile_photo_path) {
                if (!Image::rm($customer->profile_photo_path)) {
                    return back()
                        ->withInput()
                        ->withErrors(['profile_photo_path' => __('validation-inline.uploaded')]);
                }
            }

            $avatar = Image::make($request['profile_photo_path'])
                ->setExclusiveDirectory('user')
                ->autoResize()
                ->save(false, fn ($image) => $image->imagePath);

            if (!$avatar) {
                return back()
                    ->withInput()
                    ->withErrors(['profile_photo_path' => __('validation-inline.uploaded')]);
            }

            $request['profile_photo_path'] = $avatar;
        }

        $customer->update($request);

        return redirect()
            ->route('admin.user.customer.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ویرایش شد.');
    }

    public function upgradeToAdmin(User $customer): Response
    {
        $customer->user_type = ! $customer->user_type;
        $response = $customer->save();

        return $response
            ? response('')
            : response('', 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $customer)
    {
        if ($customer->profile_photo_path) {
            if (!Image::rm($customer->profile_photo_path)) {
                return back()
                    ->withInput()
                    ->withErrors(['profile_photo_path' => __('validation-inline.uploaded')]);
            }
        }

        $customer->forceDelete();

        return redirect()
            ->route('admin.user.customer.index')
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد.');
    }

    public function status(User $customer): Response
    {
        $customer->status = !$customer->status;
        $response = $customer->save();

        return $response
            ? response(['checked' => $customer->status])
            : response([], 500);
    }
}
