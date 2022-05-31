<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Order;
use App\Models\Market\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response as SymphonyResponse;

class OrderController extends Controller
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
                Order::query()
                    ->skip(request()->start)
                    ->take(request()->length)
                    ->with('payment.paymentable', 'payment.paymentType')
                    ->get()
            )->toJson();
        }

        $orderType = 'تمام سفارشات';

        return view('admin.market.order.index', compact('orderType'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sending()
    {
        if (request()->wantsJson()) {
            return datatables(
                Order::query()
                    ->skip(request()->start)
                    ->take(request()->length)
                    ->with('payment.paymentable', 'payment.paymentType')
                    ->sending()
                    ->get()
            )->toJson();
        }

        $orderType = 'سفارشات در حال ارسال';

        return view('admin.market.order.index', compact('orderType'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function unpaid()
    {
        if (request()->wantsJson()) {
            return datatables(
                Order::query()
                    ->skip(request()->start)
                    ->take(request()->length)
                    ->with('payment.paymentable', 'payment.paymentType')
                    ->unpaid()
                    ->get()
            )->toJson();
        }

        $orderType = 'سفارشات پرداخت نشده';

        return view('admin.market.order.index', compact('orderType'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rejected()
    {
        if (request()->wantsJson()) {
            return datatables(
                Order::query()
                    ->skip(request()->start)
                    ->take(request()->length)
                    ->with('payment.paymentable', 'payment.paymentType')
                    ->rejected()
                    ->get()
            )->toJson();
        }

        $orderType = 'سفارشات باطل شده';

        return view('admin.market.order.index', compact('orderType'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function returned()
    {
        if (request()->wantsJson()) {
            return datatables(
                Order::query()
                    ->skip(request()->start)
                    ->take(request()->length)
                    ->with('payment.paymentable', 'payment.paymentType')
                    ->returned()
                    ->get()
            )->toJson();
        }

        $orderType = 'سفارشات برگشت داده شده';

        return view('admin.market.order.index', compact('orderType'));
    }

    /**
     * Display a list of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order): View
    {
        return view('admin.market.order.show', compact('order'));
    }

    /**
     * Display a list of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orderItems(Order $order)
    {
        if (request()->wantsJson()) {
            return datatables(
                $order->items
            )->toJson();
        }

        return view('admin.market.order.order-items', compact('order'));
    }


    /**
     * Changes delivery_status
     */
    public function orderSent(Order $order): RedirectResponse
    {
        $order->delivery_status = Order::SENT;
        $order->save();

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت تغییر داده شد');
    }

    public function orderNotSent(Order $order): RedirectResponse
    {
        $order->delivery_status = Order::NOTSENT;
        $order->save();

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت تغییر داده شد');
    }

    public function orderIsSending(Order $order): RedirectResponse
    {
        $order->delivery_status = Order::ISSENDING;
        $order->save();

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت تغییر داده شد');
    }

    public function orderReceived(Order $order): RedirectResponse
    {
        $order->delivery_status = Order::RECEIVED;
        $order->save();

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت تغییر داده شد');
    }

    /**
     * Changes order_status
     */
    public function notAccepted(Order $order): RedirectResponse
    {
        $order->order_status = Order::NOTACCEPTED;
        $order->save();

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت تغییر داده شد');
    }

    public function accepted(Order $order): RedirectResponse
    {
        $order->order_status = Order::ACCEPTED;
        $order->save();

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت تغییر داده شد');
    }

    public function waitingForAccept(Order $order): RedirectResponse
    {
        $order->order_status = Order::WAITING;
        $order->save();

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت تغییر داده شد');
    }

    /**
     * Change payment status
     */
    public function changeStatus(Order $order, string $status_number): RedirectResponse
    {
        $payment = $order->payment;

        if (!in_array($status_number, Payment::STATUSES)) {
            return response(['message' => __('Try again later.')], SymphonyResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        $payment->status = $status_number;
        $payment->save();

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت تغییر داده شد');
    }
}
