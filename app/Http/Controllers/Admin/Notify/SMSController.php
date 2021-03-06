<?php

namespace App\Http\Controllers\Admin\Notify;

use App\Models\Notify\SMS;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\Notify\SMSRequest;
use App\Services\DateService;
use Illuminate\Support\Facades\DB;

class SMSController extends Controller
{
    /**
     * @return \Illuminate\View\View|Illuminate\Http\JsonResponse
     */
    public function archive()
    {
        if (request()->wantsJson()) {

            return datatables(
                SMS::select('id', 'title', 'body', 'status', 'send_at')->onlyTrashed()
            )->editColumn('title', function ($value) {
                return Str::limit($value->title, 10);
            })->editColumn('body', function ($value) {
                return Str::limit($value->body, 20);
            })->editColumn('send_at', function ($value) {
                return jFormat($value->send_at);
            })->filterColumn('send_at', function ($query, $keyword) {
                if (preg_match('/[\d]{4}-[\d]{2}-[\d]{2}/', $keyword)) {
                    $keyword = toCarbon($keyword, 'Y-m-d')->format('Y-m-d');
                    $query->whereRaw('DATE(send_at) LIKE ?', $keyword);
                }
            })->toJson();
        }

        $dates = DB::table('public_sms')
            ->select('send_at')
            ->whereNotNull('deleted_at')
            ->pluck('send_at');

        $dates = (new DateService())
            ->getSeparatedDates($dates);

        $years = $dates['years'];
        $months = $dates['months'];
        $days = $dates['days'];

        return view('admin.notify.sms.archive.index', compact('years', 'months', 'days'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->wantsJson()) {

            return datatables(
                SMS::select('id', 'title', 'body', 'status', 'send_at')
            )->editColumn('title', function ($value) {
                return Str::limit($value->title, 10, '...');
            })->editColumn('body', function ($value) {
                return Str::limit($value->body, 20, '...');
            })->editColumn('send_at', function ($value) {
                return jFormat($value->send_at);
            })->filterColumn('send_at', function ($query, $keyword) {
                if (preg_match('/[\d]{4}-[\d]{2}-[\d]{2}/', $keyword)) {
                    $keyword = toCarbon($keyword, 'Y-m-d')->format('Y-m-d');
                    $query->whereRaw('DATE(send_at) LIKE ?', $keyword);
                }
            })->toJson();
        }

        $dates = DB::table('public_sms')
            ->select('send_at')
            ->whereNull('deleted_at')
            ->pluck('send_at');

        $dates = (new DateService())
            ->getSeparatedDates($dates);

        $years = $dates['years'];
        $months = $dates['months'];
        $days = $dates['days'];

        return view('admin.notify.sms.index', compact('years', 'months', 'days'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notify.sms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SMSRequest $request)
    {
        $request = $request->validated();
        $request['send_at'] = substr($request['send_at'], 0, 10);
        $request['send_at'] = date('Y-m-d H:i:s', $request['send_at']);

        SMS::create($request);

        return redirect()
            ->route('admin.notify.sms.index')
            ->with('sweetalert-mixin-success', '???? ???????????? ?????????? ????');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SMS $sms)
    {
        return view('admin.notify.sms.edit', compact('sms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SMSRequest $request, SMS $sms)
    {
        $request = $request->validated();
        $request['send_at'] = substr($request['send_at'], 0, 10);
        $request['send_at'] = date('Y-m-d H:i:s', $request['send_at']);

        $sms->update($request);

        return redirect()
            ->route('admin.notify.sms.index')
            ->with('sweetalert-mixin-success', '???? ???????????? ???????????? ????');
    }

    public function restore(int $id): RedirectResponse
    {
        SMS::withTrashed()->where('id', $id)->restore();

        return redirect()
            ->route('admin.notify.sms.archive')
            ->with('sweetalert-mixin-success', '???? ???????????? ?????????????????? ????');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SMS $sms)
    {
        $sms->delete();

        return back()
            ->with('sweetalert-mixin-success', '???? ???????????? ?????? ????');
    }

    public function forceDelete(int $id): RedirectResponse
    {
        SMS::withTrashed()->where('id', $id)->forceDelete();

        return redirect()
            ->route('admin.notify.sms.archive')
            ->with('sweetalert-mixin-success', '???? ???????????? ?????? ????');
    }

    public function changeStatus(SMS $sms): Response
    {
        $sms->status = !$sms->status;
        $result = $sms->save();

        return $result
            ? response(['checked' => $sms->status])
            : response('', 500);
    }
}
