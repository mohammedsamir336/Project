<?php

namespace App\Traits;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\contact;
use App\comments;
use App\User;
use App\posts;
use App\Reply;
use App\videos;
use App\Rep;
use App\profile;
use Session;
use Carbon\Carbon;
use DB;
use Auth;
use Nexmo;

trait allposts
{

   /**
    * Show the application dashboard.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function allposts(Request $request, $header=null)
    {

/*readmore page codes
 *name of route url from readmore page
 */
        if (\Route::current()->getName() == 'readmore') {
            $years = DB::table('posts')
        ->distinct()
        ->select(DB::raw('YEAR(created_at) year'))
        ->groupBy('created_at')
        ->orderBy('year', 'desc')
        ->get();



            $Archive = DB::table('posts')
            ->distinct()
            ->select(DB::raw('YEAR(created_at) year, MONTHNAME(created_at) month_name, month(created_at) month'))
            ->groupBy('year', 'created_at')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'asc')
            ->get();

            //return     $h;
            //$Archive = posts::distinct()->get();
            //$years = posts::orderBy('created_at','desc')->distinct('YEAR(created_at)')->get();


            /*$Archive = DB::table('posts')
                ->distinct()
                ->select(DB::raw('YEAR(created_at) year, MONTH(created_at) month, MONTHNAME(created_at) month_name, COUNT(*) post_count'))
                ->groupBy('year','created_at')
                ->groupBy('month','created_at')
                ->orderBy('year', 'desc')
                ->orderBy('month', 'asc')
                ->get();*/
            //return   $Archive;

            /*$years = DB::table('posts')
                ->distinct()
                ->select(DB::raw('YEAR(created_at) year'))
                ->groupBy('year','created_at')
                ->orderBy('year', 'desc')
                ->get();*/

            //array_key_exists()
            //$years = posts::select('created_at')->paginate(8);


            //readmore post
            $posts= posts::where('header', $header)->firstOrFail();

            //make session to count views
            $id = $posts->id;
            $Views = 'blog_' . $id;
            if (!Session::has($Views)) {
                $posts->increment('view_count');
                Session::put($Views, 1);
            }
            /*comments
             *$comments_data = comments::all('text', 'Reply', 'name')->where('posts_id',$id);*/
            $comments = comments::where('posts_id', $id)->count();

            $comments_data = $posts->comments()//this is function in posts model      //comments::orderBy('id','asc')
                        ->orderBy('id', 'asc')                              // ->where('posts_id',$id)                                                                                                                        //->paginate(7);
                        ->paginate(7);                                      //->withcount('comment')

  //replies
            $replies = Reply::orderBy('reply_id', 'asc')
                        ->join('users', 'users.id', '=', 'reply_users_id')
                        ->get();

            /* rep on rep*/
            $reply = rep::all();



            return view($this->view, [
      'posts'         => $posts ,
      'reply'         => $reply ,
      'comments'      => $comments,
      'replies'       => $replies,
      'comments_data' => $comments_data,
      'header'        => $header ,
      'years'         => $years,
      'Archive'       => $Archive,
      ]);
        }


        /*category page*/
        if (\Route::current()->getName() == 'category') {
            $cat = posts::orderBy('id', 'desc')
                    ->where('cat', $header)
                    ->paginate(8);

            //header category page
            $maxcat = posts::orderBy('view_count', 'asc')
                        ->where('cat', $header)
                        ->limit(5)
                        ->get();

            $mostone = posts::orderBy('view_count', 'asc')
              ->where('cat', $header)
              ->firstOrFail();


            return view('category', [

        'header'        => $header ,
        'cat'           => $cat,
        'maxcat'        => $maxcat,
        'mostone'       => $mostone,
   ]);
        }


        if (\Route::current()->getName() == 'profile') {
            $email = request('email');
            /* I insert into column profile id and email when user register
            in Illuminate\Foundation\Auth\RegistersUsers register function
            to get profile by email*/

            $profile_data = profile::where('email', $email)
                         ->whereNotNull('users_id')
                         ->firstOrFail();

            /* chech if not admins email*/
            if ($profile_data->users_id) {
                $id = $profile_data->users_id;

                $comm_count    = comments::where('users_id', $id)->count();
                $contact_count = contact::where('users_id', $id)->count();

                return view('auth.users_profile', [
        'profile_data'  => $profile_data,
        'comm_count'    => $comm_count,
        'contact_count' => $contact_count,
       ]);
            }
        }
    }
}
