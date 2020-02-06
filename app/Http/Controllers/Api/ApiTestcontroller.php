<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Resources\TestResource;
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

class ApiTestcontroller extends Controller
{
    public function login()
    {
        if (auth()->attempt(['email'=>request('email'),'password'=>request('password')])) {
            $user = auth()->user();
            $user->api_token = Str::random(61);
            $user->save();
            return response(['status'=>true, 'user'=>$user,'token'=>$user->api_token]);
        } else {
            return response(['status'=>false, 'message'=>'not user']);
        }
    }

    public function api_posts()
    {
        $posts = posts::orderBy('id', 'desc')->get();
        return TestResource::collection($posts); //for one data not many use new TestResource
    }


    public function api_OnePost($id =null)
    {
        $posts = posts::findOrFail($id);
        return new TestResource($posts); //for one data not many use new TestResource
    }




    public function ReadMore($header =null)
    {
        $years = DB::table('posts')
            ->distinct()
            ->select(DB::raw('YEAR(created_at) year'))
            ->groupBy('created_at')
            ->orderBy('year', 'desc')
            ->get();



        $Archive = DB::table('posts')
                ->distinct()
                ->select(DB::raw('YEAR(created_at) year, MONTHNAME(created_at) month_name, MONTH(created_at) month'))
                ->groupBy('year', 'created_at')
                ->orderBy('year', 'desc')
                ->orderBy('month', 'asc')
                ->get();

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

        $html = view('readmore', [
          'posts'         => $posts ,
          'reply'         => $reply ,
          'comments'      => $comments,
          'replies'       => $replies,
          'comments_data' => $comments_data,
          'header'        => $header ,
          'years'         => $years,
          'Archive'       => $Archive,
          ])->render();

        return response(['status'=>true, 'data'=>$html]);
    }
}
