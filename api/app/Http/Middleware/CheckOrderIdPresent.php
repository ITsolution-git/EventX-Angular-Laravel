<?php

namespace HttpClient\Http\Middleware;

use Closure;

class CheckOrderIdPresent
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
        $order_id = $request->session()->get('order_id');
        if($order_id){

            return $next($request);

        } else {
                return redirect('/')->with('message', 'To proceed, please create a new order or choose an existing one.');
          }
    }
}
