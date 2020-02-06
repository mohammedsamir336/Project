<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Closure;
use App\posts;
class headerposts
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
      if (!auth()->check()) {

      //latest
       $latest= posts::orderBy('id','desc')->paginate(7);
          //Entertainment
           $Entertainment = posts::orderBy('id','desc')->where('cat', 'entertainment')->paginate(4);
           $game = posts::orderBy('id','desc')->where('type', 'Game')->paginate(4);
           $Celebrity = posts::orderBy('id','desc')->where('type', 'Celebrity')->paginate(4);
           return view('home',[
          'latest' => $latest, 'Entertainment' => $Entertainment, 'game' => $game,'Celebrity' => $Celebrity,

         ]);

         }
        return $next($request);
    }
}
