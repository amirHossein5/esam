<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function all(): View
    {
        return view('admin.market.order.index');
    }

    public function newOrders(): View
    {
        return view('admin.market.order.index');
    }

    public function sending(): View
    {
        return view('admin.market.order.index');
    }

    public function unpaid(): View
    {
        return view('admin.market.order.index');
    }

    public function canceled(): View
    {
        return view('admin.market.order.index');
    }

    public function returned(): View
    {
        return view('admin.market.order.index');
    }

    public function show(): View
    {
        return view('admin.market.order.index');
    }

    public function changeSellStatus(): View
    {
        return view('admin.market.order.index');
    }

    public function changeOrderStatus(): View
    {
        return view('admin.market.order.index');
    }

    public function cancelOrder(): View
    {
        return view('admin.market.order.index');
    }
}
