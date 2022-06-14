<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Payment;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as SymphonyResponse;

class PaymentController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->wantsJson()) {
            $payments = Payment::with('paymentable', 'user:first_name,last_name,id', 'paymentType');
            $count = $payments->count();

            return datatables(
                $payments
                    ->skip(request()->start)
                    ->take(request()->length)
                    ->get()
            )->setTotalRecords($count)->skipPaging()->toJson();
        }

        $paymentType = 'تمام پرداخت ها';

        return view('admin.market.payment.index', compact('paymentType'));
    }

    public function changeStatus(Payment $payment, string $status_number): Response
    {
        if (!in_array($status_number, Payment::STATUSES)) {
            return response(['message' => __('Try again later.')], SymphonyResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        $payment->status = $status_number;
        $result = $payment->save();

        return $result
            ? response([''])
            : response([], 500);
    }

    // /**
    //  * @return \Illuminate\Http\Response
    //  */
    // public function online()
    // {
    //     if (request()->wantsJson()) {
    //         return datatables(
    //             Payment::with('paymentable', 'user:first_name,last_name,id')
    //                 ->where('paymentable_type', OnlinePayment::class)
    //                 ->skip(request()->start)
    //                 ->take(request()->length)
    //                 ->get()
    //         )->toJson();
    //     }

    //     $paymentType = __('online payments');

    //     return view('admin.market.payment.index', compact('paymentType'));
    // }
}
