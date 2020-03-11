<?php

namespace App\Http\Middleware;
use App\News;
use Closure;

class CheckRole
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
        // if(auth()->user()->isVip == 1){
        //     return $next($request);
        // }

        // if(auth()->user()->isAdmin == 1){
        //     return $next($request);
        // }

        $news = News::find($request->id);
        
          
        if (!$news) {
            return redirect('home')->with('error','NOT EXIST');
        } elseif (!(session()->get('AUTH')->id == $news->user_id || session()->get('AUTH')->isAdmin == 1  || session()->get('AUTH')->isVip == 1) ) {
            return redirect('home')->with('error','This is not your post');
        }
        return $next($request);
        
        // return redirect('home')->with('error','You are not VIP Person');
    }
}
