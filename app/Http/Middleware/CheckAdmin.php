<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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

        // $news = Customer::find($request->id);

        // if (!$news) {
        //     return redirect('home')->with('error','NOT EXIST');
        // } elseif (!(auth()->user()->id == $news->user_id || auth()->user()->isAdmin == 1)) {
        //     return redirect('home')->with('error','NOT ALLOW');
        // }
        // return $next($request);

        if(session()->has('AUTH') &&  session()->get('AUTH')->isAdmin == 1){
            return $next($request);
        }
        return redirect('home')->with('error','You are not Admin. SORRY!');
    }
}
