<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Content\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($url)
    {
        $page = Page::whereSlug(url($url))
            ->whereStatus(1)
            ->firstOrFail();

        return view('customer.page', compact('page'));
    }
}
