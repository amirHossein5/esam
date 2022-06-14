<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use AmirHossein5\LaravelImage\Facades\Image;
use App\Http\Requests\Admin\User\StoreAdminUserRequest;
use App\Http\Requests\Admin\User\UpdateAdminUserRequest;
use App\Models\DeliveryTime;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->wantsJson()) {
            $users = User::select('id', 'email', 'mobile', 'first_name', 'role_id', 'last_name', 'status')
                ->with(['role' => function ($query) {
                    $query->withoutGlobalScope('visible');
                }])
                ->admins();
            $count = $users->count();

            return datatables(
                $users->skip(request()->start)
                    ->take(request()->length)
                    ->get()
            )->setTotalRecords($count)->skipPaging()->toJson();
        }

        return view('admin.user.admin-user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = DB::table('roles')
            ->where('status', 0)
            ->get();

        return view('admin.user.admin-user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminUserRequest $request)
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

        User::create($request + ['user_type' => 1, 'delivery_time_id' => $delivery_time_id]);

        return redirect()
            ->route('admin.user.admin-user.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ساخته شد.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin)
    {
        $admin->load('role');

        $roles = DB::table('roles')
            ->where('status', 0)
            ->get();

        $hasCustomRole = DB::table('roles')
            ->where('status', 1)
            ->where('id', $admin->role_id)
            ->exists();

        return view('admin.user.admin-user.edit', compact('admin', 'roles', 'hasCustomRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminUserRequest $request, User $admin)
    {
        $request = $request->validated();

        if (isset($request['profile_photo_path'])) {
            if ($admin->profile_photo_path) {
                if (!Image::rm($admin->profile_photo_path)) {
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


        DB::transaction(function () use ($admin, $request) {
            $admin->update($request);

            if ($request['role_id']) {
                $admin->permissions()->detach();
            }
        });

        return redirect()
            ->route('admin.user.admin-user.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        if ($admin->profile_photo_path) {
            if (!Image::rm($admin->profile_photo_path)) {
                return back()
                    ->withInput()
                    ->withErrors(['profile_photo_path' => __('validation-inline.uploaded')]);
            }
        }

        $admin->forceDelete();

        return redirect()
            ->route('admin.user.admin-user.index')
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد.');
    }

    public function status(User $admin): Response
    {
        $admin->status = !$admin->status;
        $response = $admin->save();

        return $response
            ? response(['checked' => $admin->status])
            : response([], 500);
    }
}
