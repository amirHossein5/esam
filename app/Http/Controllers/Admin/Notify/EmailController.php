<?php

namespace App\Http\Controllers\Admin\Notify;

use Illuminate\Support\Str;
use App\Models\Notify\Email;
use App\Services\DateService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Mews\Purifier\Facades\Purifier;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\Notify\EmailRequest;
use Illuminate\Support\Facades\Storage;

class EmailController extends Controller
{
    /**
     * @return \Illuminate\View\View|Illuminate\Http\JsonResponse
     */
    public function archive()
    {
        if (request()->wantsJson()) {

            return datatables(
                Email::select('id', 'subject', 'body', 'status', 'send_at')->onlyTrashed()
            )->editColumn('subject', function ($value) {
                return Str::limit($value->subject, 10, '...');
            })->editColumn('send_at', function ($value) {
                return jFormat($value->send_at);
            })->filterColumn('send_at', function ($query, $keyword) {
                if (preg_match('/[\d]{4}-[\d]{2}-[\d]{2}/', $keyword)) {
                    $keyword = toCarbon($keyword, 'Y-m-d')->format('Y-m-d');
                    $query->whereRaw('DATE(send_at) LIKE ?', $keyword);
                }
            })->toJson();
        }

        $dates = DB::table('public_mail')
            ->select('send_at')
            ->whereNotNull('deleted_at')
            ->pluck('send_at');

        $dates = (new DateService())
            ->getSeparatedDates($dates);

        $years = $dates['years'];
        $months = $dates['months'];
        $days = $dates['days'];

        return view('admin.notify.email.archive.index', compact('years', 'months', 'days'));
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
                Email::select('id', 'subject', 'body', 'status', 'send_at')
            )->editColumn('subject', function ($value) {
                return Str::limit($value->subject, 10, '...');
            })->editColumn('send_at', function ($value) {
                return jFormat($value->send_at);
            })->filterColumn('send_at', function ($query, $keyword) {
                if (preg_match('/[\d]{4}-[\d]{2}-[\d]{2}/', $keyword)) {
                    $keyword = toCarbon($keyword, 'Y-m-d')->format('Y-m-d');
                    $query->whereRaw('DATE(send_at) LIKE ?', $keyword);
                }
            })->toJson();
        }

        $dates = DB::table('public_mail')
            ->select('send_at')
            ->whereNull('deleted_at')
            ->pluck('send_at');

        $dates = (new DateService())
            ->getSeparatedDates($dates);

        $years = $dates['years'];
        $months = $dates['months'];
        $days = $dates['days'];

        return view('admin.notify.email.index', compact('years', 'months', 'days'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notify.email.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmailRequest $request)
    {
        $request = $request->validated();
        $request['send_at'] = substr($request['send_at'], 0, 10);
        $request['send_at'] = date('Y-m-d H:i:s', $request['send_at']);
        $request['body'] = Purifier::clean($request['body']);

        Email::create($request);

        return redirect()
            ->route('admin.notify.email.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ساخته شد');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Email $email)
    {
        return view('admin.notify.email.edit', compact('email'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmailRequest $request, Email $email)
    {
        $request = $request->validated();
        $request['send_at'] = substr($request['send_at'], 0, 10);
        $request['send_at'] = date('Y-m-d H:i:s', $request['send_at']);
        $request['body'] = Purifier::clean($request['body']);

        $email->update($request);

        return redirect()
            ->route('admin.notify.email.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ویرایش شد');
    }

    public function restore(int $id): RedirectResponse
    {
        Email::onlyTrashed()->where('id', $id)->restore();

        return redirect()
            ->route('admin.notify.email.archive')
            ->with('sweetalert-mixin-success', 'با موفقیت بازگردانی شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Email $email)
    {
        $email->delete();

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }

    public function forceDelete(int $id): RedirectResponse
    {
        $email = Email::onlyTrashed()->findOrFail($id);

        $files = $email->files()->get();

        foreach ($files as $file) {
            $folder = dirname($file->file_path);

            if (Storage::exists($folder)) {
                Storage::deleteDirectory($folder);
            }
        }

        $email->forceDelete();
        $email->files()->delete();


        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }

    public function changeStatus(Email $email): Response
    {
        $email->status = !$email->status;
        $result = $email->save();

        return $result
            ? response(['checked' => $email->status])
            : response('', 500);
    }
}
