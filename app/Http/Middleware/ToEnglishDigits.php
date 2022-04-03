<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

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
        $request = $request->toArray();

        foreach ($fields as $field) {
            if (isset($request[$field])) {
                if (is_string($request[$field])) {
                    $request[$field] = faTOen($request[$field]);
                } else {
                    foreach ($request[$field] as $key => $price) {
                        $request[$field][$key] = faTOen($price);
                    }
                }
            }
        }

        request()->replace($request);

        return $next(request());
    }
}
