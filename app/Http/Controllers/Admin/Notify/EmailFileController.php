<?php

namespace App\Http\Controllers\Admin\Notify;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Notify\EmailFileRequest;
use App\Models\Notify\Email;
use App\Models\Notify\EmailFile;
use App\Models\TemporaryFile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EmailFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function archive(int $id)
    {
        $email = Email::withTrashed()->findOrFail($id);

        if (request()->wantsJson()) {
            return datatables($email->trashedFiles)
                ->editColumn('file_name', function ($item) {
                    return \Str::limit($item->file_name, 15);
                })->editColumn('file_size', function ($item) {
                    return toMB($item->file_size);
                })->editColumn('file_type', function ($item) {
                    return \Str::limit($item->file_type, 10);
                })
                ->toJson();
        }

        return view('admin.notify.email-file.archive.index', compact('email'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $id)
    {
        $email = Email::withTrashed()->findOrFail($id);

        if (request()->wantsJson()) {
            return datatables($email->files)
                ->editColumn('file_size', function ($item) {
                    return toMB($item->file_size);
                })->editColumn('file_type', function ($item) {
                    return \Str::limit($item->file_type, 10);
                })
                ->toJson();
        }

        return view('admin.notify.email-file.index', compact('email'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmailFileRequest $request, int $email)
    {
        $email = Email::withTrashed()->findOrFail($email);
        $request = $request->validated();
        $uploadedFilePath = 'email-files/tmp/' . $request['file'];

        if (!Storage::exists($uploadedFilePath)) {
            return response(['errors' => ['file' => ['فایل آپلود نشده است.']]], 422);
        }

        $size = Storage::size($uploadedFilePath);

        $request['file_size'] = $size;
        $request['file_type'] = File::extension($uploadedFilePath);
        $path = 'email-files/' . now()->format('Y/m/d') . '/email-' . $email->id;
        $fullPath = $path . '/' . $request['file_name'] . '.' . $request['file_type'];
        $request['file_path'] = $fullPath;

        // same name exists
        if (Storage::exists($fullPath)) {
            return response(['errors' => ['file' => ['فایل با این نام وجود دارد.']]], 422);
        }

        $moved = Storage::move(
            $uploadedFilePath,
            $fullPath
        );

        if (!$moved) {
            return response(['errors' => ['file' => ['فایل آپلود نشد.']]], 422);
        }

        TemporaryFile::where('file_path', $uploadedFilePath)->delete();
        unset($request['file']);

        $email->files()->create($request);

        return response(['message' => 'فایل با موفقیت آپلود شد.']);
    }

    /**
     * Download the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download(int $id)
    {
        $file = EmailFile::withTrashed()->where('id', $id)->firstOrFail()->file_path;

        return Storage::download($file);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmailFileRequest $request, int $email, int $id)
    {
        $file = EmailFile::withTrashed()->where('id', $id)->firstOrFail();

        $to = dirname($file->file_path) . '/'
            . $request->file_name . '.'
            . pathinfo($file->file_path, PATHINFO_EXTENSION);

        if (Storage::exists($to)) {
            return response(['errors' => ['file_name' => ['این فایل وجود دارد.']]], 422);
        }

        if (!Storage::move($file->file_path, $to)) {
            return response(['errors' => ['file_name' => ['مشکلی پیش آمده دوباره امتحان کنید.']]], 422);
        }

        $request = $request->validated();
        $request['file_path'] = $to;
        $file->update($request);

        return response(['message' => 'نام تغییر کرد.']);
    }

    public function restore(int $id): RedirectResponse
    {
        EmailFile::withTrashed()->where('id', $id)->restore();

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت بازگردانی شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmailFile $file)
    {
        $file->delete();

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(int $id)
    {
        $file = EmailFile::withTrashed()->where('id', $id)->firstOrFail();

        if (!Storage::delete($file->file_path)) {
            return back()
                ->with('sweetalert-mixin-danger', 'مشکلی یپش آمده دوباره امتحان کنید.');
        }

        $file->forceDelete();

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }

    public function changeStatus(EmailFile $file): Response
    {
        $file->status = !$file->status;
        $result = $file->save();

        return $result
            ? response(['checked' => $file->status])
            : response('', 500);
    }

    public function uploadFile(Request $request)
    {
        if (!$request->hasFile('emailFile')) {
            return response(['message' => __('validation.uploaded', ['attribute' => ''])], 400);
        }

        $mime = $request->emailFile->getClientOriginalExtension();

        if (!mimes('pdf,jpg,jpeg,zip,rar', $mime)) {
            return response(['message' => 'فایل با پسوند های pdf,jpg,jpeg,zip,rar مجاز می باشد.'], 400);
        }

        $file = $request->emailFile;
        $name = uniqid() . '-' . now()->timestamp . '.' . $mime;
        Storage::putFileAs('email-files/tmp', $file, $name);
        TemporaryFile::create(['file_path' => 'email-files/tmp/' . $name]);

        return $name;
    }
}
