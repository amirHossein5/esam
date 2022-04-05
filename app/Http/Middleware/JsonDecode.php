<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class JsonDecode
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
        $associative = $fields[1] ?? false;

        request()->merge([$fields[0] => json_decode($request[$fields[0]], $associative)]);

        return $next(request());
    }
}
