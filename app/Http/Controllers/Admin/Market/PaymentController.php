<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\CashPayment;
use App\Models\Market\OfflinePayment;
use App\Models\Market\OnlinePayment;
use App\Models\Market\Payment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PaymentController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->wantsJson()) {
            return datatables(
                Payment::with('paymentable', 'user:first_name,last_name,id')
                    ->skip(request()->start)
                    ->take(request()->length)
                    ->get()
            )->toJson();
        }

        $paymentType = 'تمام پرداخت ها';

        return view('admin.market.payment.index', compact('paymentType'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function offline()
    {
        if (request()->wantsJson()) {
            return datatables(
                Payment::with('paymentable', 'user:first_name,last_name,id')
                    ->where('paymentable_type', OfflinePayment::class)
                    ->skip(request()->start)
                    ->take(request()->length)
                    ->get()
            )->toJson();
        }

        $paymentType = __('offline payments');

        return view('admin.market.payment.index', compact('paymentType'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function online()
    {
        if (request()->wantsJson()) {
            return datatables(
                Payment::with('paymentable', 'user:first_name,last_name,id')
                    ->where('paymentable_type', OnlinePayment::class)
                    ->skip(request()->start)
                    ->take(request()->length)
                    ->get()
            )->toJson();
        }

        $paymentType = __('online payments');

        return view('admin.market.payment.index', compact('paymentType'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function cash()
    {
        if (request()->wantsJson()) {
            return datatables(
                Payment::with('paymentable', 'user:first_name,last_name,id')
                    ->where('paymentable_type', CashPayment::class)
                    ->skip(request()->start)
                    ->take(request()->length)
                    ->get()
            )->toJson();
        }

        $paymentType = __('cash payments');

        return view('admin.market.payment.index', compact('paymentType'));
    }

    public function reject(Payment $payment): Response
    {
        $payment->status = Payment::REJECTED;
        $result = $payment->save();

        return $result
            ? response([''])
            : response();
    }

    public function return(Payment $payment): Response
    {
        $payment->status = Payment::RETURNED;
        $result = $payment->save();

        return $result
            ? response([''])
            : response();
    }

    public function paid(Payment $payment): Response
    {
        $payment->status = Payment::PAID;
        $result = $payment->save();

        return $result
            ? response([''])
            : response();
    }

    public function notPaid(Payment $payment): Response
    {
        $payment->status = Payment::NOTPAID;
        $result = $payment->save();

        return $result
            ? response([''])
            : response();
    }
}
