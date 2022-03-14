<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DiscountController extends Controller
{
    public function copan(): View
    {
        return view('admin.market.discount.copan');
    }

    public function copanCreate(): View
    {
        return view('admin.market.discount.copan-create');
    }

    public function commonDiscount(): View
    {
        return view('admin.market.discount.common');
    }

    public function commonDiscountCreate(): View
    {
        return view('admin.market.discount.common-create');
    }

    public function amazingSale(): View
    {
        return view('admin.market.discount.amazing');
    }

    public function amazingSaleCreate(): View
    {
        return view('admin.market.discount.amazing-create');
    }
}
