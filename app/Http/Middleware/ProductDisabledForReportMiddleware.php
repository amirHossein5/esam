<?php

namespace App\Http\Middleware;

use App\Models\Market\Product;
use Closure;
use Illuminate\Http\Request;

class ProductDisabledForReportMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->route('product') instanceof Product) {
            $product = $request->route('product');
            
            if ($product->disabled_for_report === Product::DISABLE_FOR_REPORT) {
                abort(403, 'بعلت گزارش شدن فعلا این محصول غیر فعال شده است');
            }
        }

        return $next($request);
    }
}
