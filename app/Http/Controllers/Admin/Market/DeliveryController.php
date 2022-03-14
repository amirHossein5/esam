<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\DeliveryRequest;
use App\Models\Market\Delivery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class DeliveryController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function archive()
    {
        if (request()->wantsJson()) {
            return datatables(Delivery::onlyTrashed())
                ->addColumn('delivery_send_time', function ($columns) {
                    return $columns->delivery_send_time;
                })->filterColumn('delivery_send_time', function ($query, $keyword) {
                    $keyword = faTOen($keyword);
                    $sql = 'CONCAT(delivery.delivery_time_unit, " ", delivery.delivery_time) LIKE ?';
                    $query->whereRaw($sql, "%$keyword%");
                })->filterColumn('amount', function ($query, $keyword) {
                    $keyword = strtr(faTOen($keyword), ['تومان' => '']);
                    $sql = 'delivery.amount LIKE ?';
                    $query->whereRaw($sql, "%$keyword%");
                })->toJson();
        }

        return view('admin.market.delivery.archive.index');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->wantsJson()) {
            return datatables(Delivery::query())
                ->addColumn('delivery_send_time', function ($columns) {
                    return $columns->delivery_send_time;
                })->filterColumn('delivery_send_time', function ($query, $keyword) {
                    $keyword = faTOen($keyword);
                    $sql = 'CONCAT(delivery.delivery_time_unit, " ", delivery.delivery_time) LIKE ?';
                    $query->whereRaw($sql, "%$keyword%");
                })->filterColumn('amount', function ($query, $keyword) {
                    $keyword = strtr(faTOen($keyword), ['تومان' => '']);
                    $sql = 'delivery.amount LIKE ?';
                    $query->whereRaw($sql, "%$keyword%");
                })->toJson();
        }

        return view('admin.market.delivery.index');
    }

    public function create(): View
    {
        return view('admin.market.delivery.create');
    }

    public function store(DeliveryRequest $request): RedirectResponse
    {
        Delivery::create($request->validated());

        return redirect()
            ->route('admin.market.delivery.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ساخته شد');
    }

    public function edit(Delivery $delivery): View
    {
        return view('admin.market.delivery.edit', compact('delivery'));
    }

    public function update(DeliveryRequest $request, Delivery $delivery): RedirectResponse
    {
        $delivery->update($request->validated());

        return redirect()
            ->route('admin.market.delivery.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ویرایش شد');
    }

    public function restore(int $id): RedirectResponse
    {
        Delivery::onlyTrashed()->findOrFail($id)->restore();

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت بازگردانی شد');
    }

    public function destroy(Delivery $delivery): RedirectResponse
    {
        $delivery->delete();

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }

    public function forceDelete(int $id): RedirectResponse
    {
        Delivery::onlyTrashed()->findOrFail($id)->forceDelete();

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }

    public function changeStatus(Delivery $delivery): Response
    {
        $delivery->status = !$delivery->status;
        $result = $delivery->save();

        return $result
            ? response(['checked' => $delivery->status])
            : response('', 500);
    }
}
