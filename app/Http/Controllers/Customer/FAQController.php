<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Content\FAQ;
use App\Models\Content\FAQCategory;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqCategories = FAQCategory::actives()
            ->with(['faqs' => fn ($query) => $query->actives()->take(5) ])
            ->get();

        $randomFaqs = collect($faqCategories)
            ->pluck('faqs')
            ->flatten()
            ->shuffle()
            ->take(4);

        return view('customer.faq.index', compact('faqCategories', 'randomFaqs'));
    }

    /**
     * Display a item of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(FAQ $faq)
    {
        if ($faq->status != FAQ::ENABLE) {
            abort(404);
        }
        return view('customer.faq.show', compact('faq'));
    }
}
