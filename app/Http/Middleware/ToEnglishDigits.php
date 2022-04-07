<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Lang;

class ToEnglishDigits
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string ...$fields)
    {
        foreach ($fields as $field) {
            if ($request->has($field)) {
                if (is_string($request->input($field))) {
                    request()->merge([$field => faTOen($request->$field)]);
                }
            }

            if (preg_match("/\.|\*/", $field)) {

                if (preg_match('/(\w+)\./', $field, $rootField)) {
                    $field = str_replace($rootField[0], '', $field);
                    $data = request($rootField[1]);

                    data_set_closure($data, $field, function ($data) {
                        return str_replace([',', '٫', '.'], '', faTOen($data));
                    });

                    request()->merge([$rootField[1] => $data]);
                }

            }
        }

        return $next(request());
    }
}
