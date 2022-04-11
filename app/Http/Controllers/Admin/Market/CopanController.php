<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\Discount\CopanRequest;
use App\Models\Market\Copan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CopanController extends Controller
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
                Copan::skip(request()->start)
                    ->take(request()->length)
                    ->with('user:id,first_name,last_name')
                    ->get()
            )->toJson();
        }

        return view('admin.market.discount.copan.index');
    }

    /**
     * Create a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = DB::table('users')->get(['first_name', 'last_name', 'id']);

        return view('admin.market.discount.copan.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CopanRequest $request)
    {
        $request = $request->validated();

        $request['start_date'] = substr($request['start_date'], 0, 10);
        $request['start_date'] = date('Y-m-d H:i:s', $request['start_date']);
        $request['end_date'] = substr($request['end_date'], 0, 10);
        $request['end_date'] = date('Y-m-d H:i:s', $request['end_date']);

        if ($request['type'] == Copan::PUBLIC) {
            unset($request['user_id']);
        }

        if ($request['amount_type'] == Copan::PRICEUNIT) {
            unset($request['discount_ceiling']);
        }

        Copan::create($request);

        return redirect()
            ->route('admin.market.discount.copan.index')
            ->with('sweetalert-mixin-success', 'با موفقیت اضافه شد');
    }

    /**
     * Edit a listing of the resource.
     *
     * @param \App\Models\Market\Copan $copan
     * @return \Illuminate\Http\Response
     */
    public function edit(Copan $copan)
    {
        $users = DB::table('users')->get(['first_name', 'last_name', 'id']);

        return view('admin.market.discount.copan.edit', compact('copan', 'users'));
    }

    /**
     * Update a created resource in storage.
     *
     * @param \App\Models\Market\Copan $copan
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CopanRequest $request, Copan $copan)
    {
        $request = $request->validated();

        $request['start_date'] = substr($request['start_date'], 0, 10);
        $request['start_date'] = date('Y-m-d H:i:s', $request['start_date']);
        $request['end_date'] = substr($request['end_date'], 0, 10);
        $request['end_date'] = date('Y-m-d H:i:s', $request['end_date']);

        if ($request['type'] == Copan::PUBLIC) {
            $request['user_id'] = null;
        }

        if ($request['amount_type'] == Copan::PRICEUNIT) {
            $request['discount_ceiling'] = null;
        }

        $copan->update($request);

        return redirect()
            ->route('admin.market.discount.copan.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ویرایش شد');
    }

    /**
     * Delete a resource.
     *
     * @param \App\Models\Market\Copan $copan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Copan $copan)
    {
        $copan->delete();

        return redirect()
            ->route('admin.market.discount.copan.index')
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }

    /**
     * Changes status of resource.
     *
     * @param \App\Models\Market\Copan $copan
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Copan $copan): Response
    {
        $copan->status = !$copan->status;
        $result = $copan->save();

        return $result
            ? response(['checked' => $copan->status])
            : response('', 500);
    }
}
