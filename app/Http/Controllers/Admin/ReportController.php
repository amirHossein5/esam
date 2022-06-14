<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Market\Product;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->wantsJson()) {
            $reports = Report::query()
                    ->with('product:id,name,disabled_for_report,slug');
            $totalReportsCount = $reports->count();

            return datatables(
                $reports->skip(request()->start)
                    ->take(request()->length)
                    ->get()
                    ->map(function ($report) {
                        $report->title = Report::TITLES[$report->title];
                        return $report;
                    })
            )->setTotalRecords($totalReportsCount)->skipPaging()->toJson();
        }

        $reportMod = 'همه گزارش ها';

        return view('admin.reports.index', compact('reportMod'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function disabledForReport()
    {
        if (request()->wantsJson()) {
            $reports = Report::whereHas('product', fn ($q) => $q->where('disabled_for_report', Product::DISABLE_FOR_REPORT))
                ->with('product:id,name,disabled_for_report,slug');
            $count = $reports->count();

            return datatables(
                $reports->skip(request()->start)
                    ->take(request()->length)
                    ->get()
                    ->map(function ($report) {
                        $report->title = Report::TITLES[$report->title];
                        return $report;
                    })
            )->setTotalRecords($count)->skipPaging()->toJson();
        }

        $reportMod = 'محصولات بسته شده';

        return view('admin.reports.index', compact('reportMod'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function notDisabledForReport()
    {
        if (request()->wantsJson()) {
            $reports = Report::whereHas('product', fn ($q) => $q->where('disabled_for_report', Product::NOT_DISABLE_FOR_REPORT))
                ->with('product:id,name,disabled_for_report,slug');
            $count = $reports->count();

            return datatables(
                $reports->skip(request()->start)
                    ->take(request()->length)
                    ->get()
                    ->map(function ($report) {
                        $report->title = Report::TITLES[$report->title];
                        return $report;
                    })
            )->setTotalRecords($count)->skipPaging()->toJson();
        }

        $reportMod = 'محصولات بسته نشده';

        return view('admin.reports.index', compact('reportMod'));
    }

    /**
     * Display a resource.
     *
     * @param \App\Models\Report $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        $report->load('product:id,name,disabled_for_report,slug');
        $report =  collect($report)->toArray();
        $report['title'] = Report::TITLES[collect($report)['title']];

        return view('admin.reports.show', compact('report'));
    }

    /**
     * Toggle disabled_for_report of reported product.
     *
     * @param \App\Models\Report $report
     * @return \Illuminate\Http\Response
     */
    public function toggleDisableProduct(Request $request, Report $report)
    {
        $report->product->disabled_for_report = !$report->product->disabled_for_report;
        $report->product->save();

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت تغییر داده شد');
    }
}
