<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\contact;
use App\comments;
use App\User;
use App\posts;
use App\Visitors;
use Session;
use DB;
use Auth;
use Nexmo;
use Carbon\Carbon;
use App\Traits\allposts;
class HomeController extends Controller
{

use allposts;

      /**
       * Where to redirect users after login.
       *
       * @var string
       */
      protected $view = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   /* switch between guards
      * \Config::set('auth.defaults.guard', 'the guard Name');*/

       //in verified middleware file \Illuminate\Auth\Middleware\EnsureEmailIsVerified i put auth check to let guest view home page
        $this->middleware(['guest' => 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      // user ip
    /* dd(request()->ip());*/


      /*verify phone*/
      if (auth()->check()) {
        if (!auth()->user()->phone_verified_at) {
          //send code if not users verify phone
           try {
             $verification = Nexmo::verify()->start([
                   'number' => auth()->user()->phone,
                   'brand' => 'Phone Verification',
               ]);

            //session(['nexmo_request_id' => $verification->getRequestId()]);
                   return redirect('nexmo');

              } catch (Nexmo\Client\Exception\Request $e) {
                return redirect('nexmo')->with('error' , $e->getMessage());

              }

        }
     }



     $last_oneposts = posts::orderBy('id','DESC')->firstOrFail();

     $last_posts = posts::orderBy('id','DESC')
              ->where('id','!=',$last_oneposts->id)
              ->limit(3)
              ->get();


/* count Visitors of each day for month or years dont Rewriting visit_at */
      $Visitors = Visitors::first();

      if ($Visitors->visit_at->format('Y-m-d') == today()->toDateString()) {

        $count = 'blog_';
        if (!Session($count)) {
        $Visitors->increment('visitors');
        Session([$count => 1]);
      }

    }else {
      $Visitors->visit_at = today()->toDateString();
      $Visitors->visitors = 0 ;
      $Visitors->save();
    }


        return view($this->view,[
          'last_posts'    => $last_posts,
          'last_oneposts' => $last_oneposts,
        ]);

  }

}
