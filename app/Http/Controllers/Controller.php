<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function imageError(string $name = 'image'): RedirectResponse
    {
        return back()
            ->withInput()
            ->withErrors([$name => __('validation.uploaded', ['attribute' => 'عکس'])]);
    }

    protected function imageRmError(): RedirectResponse
    {
        return back()
            ->with('sweetalert-mixin-danger', 'مشکلی پیش آمده دوباره امتحان کنید');
    }
}
