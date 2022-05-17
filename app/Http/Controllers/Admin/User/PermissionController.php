<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PermissionRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class PermissionController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin)
    {
        if (!$admin->isAdmin()) {
            return abort(Response::HTTP_UNAUTHORIZED);
        }
        
        $permissions = DB::table('permissions')->get();

        return view('admin.user.admin-user.permissions', compact('permissions', 'admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, User $admin)
    {
        if (!$admin->isAdmin()) {
            return abort(Response::HTTP_UNAUTHORIZED);
        }

        DB::transaction(function () use ($request, $admin) {
            if (! $request->has('permissions')) {
                $admin->update(['role_id' => null]);
            } else {
                $customRoleId = DB::table('roles')
                    ->where('name', Role::CUSTOM_ROLE)
                    ->value('id');

                $admin->update(['role_id' => $customRoleId]);
            }

            $admin->permissions()->sync($request->permissions);
        });

        return redirect()
            ->route('admin.user.admin-user.index')
            ->with('sweetalert-mixin-success', 'با موفقیت تغییر داده شد');
    }
}
