<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Admin;
use App\User;

class CheckBlockedUsers
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
        /* this Middleware class in Kernel file in protected $middlewareGroups web
         * check actives users*/
        if (auth()->check()) {
            $data = auth()->user()->blocked_date;

            if ($data) {
                $banned_days = now()->diffForHumans($data, true);

                /* if  block date > date now to check that the days of the ban are over*/
                if ($data > now()) {
                    $message = trans('auth.Your account has been blocked by Admin you can wait').' ' . $banned_days .' '. trans('auth.before Unblock.');
                    auth()->logout();
                    return redirect('login')->withMessage($message);
                } else {
                    /* when  end blocked days and user logout after he login give remember_token token and give blocked_date null to unblock*/
                    $email = Auth::user()->email;
                    $user =  User::where('email', $email)->update([
          'blocked_date' => null,
          ]);
                }
            }
        }


        /* this Middleware class in Kernel file in protected $middlewareGroups web
         * check actives admins*/
        if (Auth::guard('admin')->user()) {
            $data = auth()->guard('admin')->user()->blocked_date;

            if ($data) {
                $banned_days = now()->diffForHumans($data, true);

                /* if  block date > date now to check that the days of the ban are over*/
                if ($data > now()) {
                    $message = trans('auth.Your account has been blocked by Administrator you can wait').' ' .$banned_days .' '. trans('auth.before Unblock.');
                    auth()->guard('admin')->logout();
                    return redirect('admin/login')->withMessage($message);
                } else {
                    /* when  end blocked days and admin login give blocked_date null to unblock*/
                    $email = Auth::guard('admin')->user()->email;
                    $admin =  Admin::where('email', $email)->update([
           'blocked_date' => null,
           ]);
                }
            }
        }

        return $next($request);
    }
}
