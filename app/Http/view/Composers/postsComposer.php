<?php

namespace App\Http\view\Composers;

use Illuminate\view\view;
use App\posts;
use App\videos;
use Auth;
use App\contact;
class postsComposer
{
  public function Compose(view $view)
  {

    $view->with([

    //'posts_all'            =>  posts::orderBy('id','desc')->get(),

   'Popular_posts'         => posts::orderBy('view_count','desc')
                                      ->limit(4)
                                      ->get(),
   'count_Entertainment'   => posts::where('cat','entertainment')->count(),
     'count_Technology'    => posts::where('cat','Technology')->count(),
     'count_Travel'        => posts::where('cat','Travel')->count(),
     'count_Life'          => posts::where('cat','Life')->count(),
     'count_Business'      => posts::where('cat','Business')->count(),

     'Entertainment_one'   => posts::orderBy('id','desc')
                                          ->where('cat', 'entertainment')
                                          ->first(),
     'Business_one'        => posts::orderBy('id','desc')
                                        ->where('cat', 'Business')
                                        ->first(),
     'Technology_one'      => posts::orderBy('id','desc')
                                          ->where('cat', 'Technology')
                                          ->first(),
     'Life_one'            => posts::orderBy('id','desc')
                                         ->where('cat', 'Life')
                                         ->first(),
     'Fashion_one'         =>  posts::orderBy('id','desc')
                                         ->where('cat', 'Fashion')
                                         ->first(),
     'Travel_one'          => posts::orderBy('id','desc')
                                        ->where('cat', 'Travel')
                                        ->first(),
     'videos_home'         =>  videos::orderBy('id','desc')->first(),

     'videos_cat'          =>  videos::orderBy('id','desc')->paginate(8),

     'vid_cat'             =>  videos::orderBy('id','desc')->get(),

     'video_count'         =>  videos::count(),

     'user'                =>  Auth::user(),

     'contact'             => contact::orderBy('id','desc')
                                         ->limit(5)
                                         ->get(),
     'notfiy'              => contact::where('status' , 0)->count(),
//navbar posts
     'Entertainment_Nav'   => posts::orderBy('id','desc')->where('cat' , 'Entertainment')
                                          ->limit(4)
                                          ->get(),
     'Games_Nav'           => posts::orderBy('id','desc')->where('type' ,'Games')
                                          ->limit(4)
                                          ->get(),
     'Celebrity_Nav'       => posts::orderBy('id','desc')->where('type' ,'Celebrity')
                                          ->limit(4)
                                          ->get(),

     'Business_Nav'        => posts::orderBy('id','desc')->where('cat' ,'Business')
                                          ->limit(4)
                                          ->get(),
     'Economy_Nav'         => posts::orderBy('id','desc')->where('type' ,'Economy')
                                          ->limit(4)
                                          ->get(),

     'Life_Nav'            => posts::orderBy('id','desc')->where('cat' , 'Life')
                                           ->limit(4)
                                           ->get(),

     'Travel_Nav'          => posts::orderBy('id','desc')->where('cat' ,'Travel')
                                           ->limit(4)
                                           ->get(),
     'Hotels_Nav'          => posts::orderBy('id','desc')->where('type' ,'Hotels')
                                           ->limit(4)
                                           ->get(),

//home  posts
    'Fashion'             => posts::orderBy('id','desc')->where('cat' ,'Fashion')
                                            ->limit(3)
                                            ->get(),
    'Technology'          => posts::orderBy('id','desc')->where('cat' ,'Technology')
                                            ->limit(3)
                                            ->get(),




    ]);
  }
}
