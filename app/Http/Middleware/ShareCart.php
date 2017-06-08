<?php

namespace App\Http\Middleware;

use App\Shopping\Cart;
use Closure;

class ShareCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $cart = Cart::createFromSession();
      view()->share('cart', $cart);
        return $next($request);
    }
}
