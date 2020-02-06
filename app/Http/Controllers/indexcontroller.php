<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\contact;
use App\comments;
use App\User;
use App\posts;
use App\Reply;
use App\Rep;
use App\videos;
use App\profile;
use Session;
use Carbon\Carbon;
use DB;
use Auth;
use App\Traits\allposts;

class indexcontroller extends Controller
{
    use allposts;

    /**
     * Where to redirect users after login.
     *
     * @var string
      */
    protected $view = 'readmore';

    /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
    public function type($cat=null, $type=null)
    {

//check if url correct
        $check= posts::orderBy('view_count', 'DESC')
              ->where(['cat' => $cat,'type' => $type])
              ->firstOrFail();

        /*type page*/
        $data = posts::orderBy('id', 'desc')
             ->where('type', $type)
             ->paginate(8);

        $mintype = posts::orderBy('view_count', 'asc')
              ->where('type', $type)
              ->limit(5)
              ->get();

        $mostone = posts::orderBy('view_count', 'asc')
                         ->where('type', $type)
                         ->firstOrFail();

        return view('type', [
               'type'          => $type ,
               'data'          => $data,
               'mintype'       => $mintype,
               'mostone'       => $mostone,
               'cat'           => $cat,
             ]);
    }

    /**
     * the form for creating a new resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function change_profile(Request $request)
    {
        $email  =  Auth::user()->email;

        $data = [
            'name'       => request('name'),
            'job'        => request('job'),
            'about'      => request('about'),
            'Website'    => request('website'),
            'birth'      => request('birth'),
            'facebook'   => request('facebook'),
            'profile_phone'=> request('phone'),
             ];

        /* I insert email into profile when users register in RegisterController*/
        profile::where('email', $email)->update($data);
        User::where('email', $email)->update(['name'=> request('name')]);
        return back()->with('success', 'Profile updated successfully ');
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reply($id=null, $id2=null)
    {
        if (Auth::check()) {

        /*reply on reply*/
            if (\Route::current()->getName() == 'repOnrep') {
                $rep  = rep::UpdateOrCreate([

      'reptext'         => request('reply'),
      'name_rep'        => auth()->user()->name,
      'email_rep'       => auth()->user()->email,
      'rep_comments_id' => $id, //comment id
      'rep_users_id'    => auth()->user()->id,
      'rep_rep_id'      => $id2, //reply id
        ]);

                return back();
            } else {
                $reply = Reply::UpdateOrCreate([

      'reply'             => request('reply'),
      'name_reply'        => auth()->user()->name,
      'email_reply'       => auth()->user()->email,
      'reply_comments_id' => $id,//comment id
      'reply_users_id'    => auth()->user()->id,
          //'posts_id' =>
        ]);

                return back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function readmore(Request $request, $header=null)
    {
        /* foreach ($comments_data as $data) {
         $users_id = $data->users_id;
         $comments_id = $data->id;
         if ($users_id != 0) {
           //$img = User::where('id',$users_id)->get();
           $users_data = comments::join('users', 'users.id', '=', 'comments.users_id')
            ->where('users.id', $users_id)
            ->get();
              return  $users_id;
        }
    }*/

    //time
    /*  $now = Carbon::now();
      $time= $now->format('a');*/

      //readmore post
      /*$posts= posts::where('header',$header)
      ->first();
      $id = $posts->id;

      //make session to count views
       $Views = 'blog_' . $id;
      if (!Session::has($Views)) {
       $posts->increment('view_count');
      Session::put($Views,1);
      }
      //comments
       //$comments_data = comments::all('text', 'Reply', 'name')->where('posts_id',$id);
        $comments = comments::where('posts_id',$id)
        ->count();

        $comments_data = comments::orderBy('id','desc')
        ->where('posts_id',$id)
        ->get();
//return $comments_data;
        //$reply = comments::join('replies', 'comments.id', '=', 'replies.reply_comments_id')
      //  ->get();

      /*$comments_data = comments::orderBy('comments.id','desc')
      ->where('comments.posts_id',$id)
      ->join('replies', 'comments.id', '=', 'replies.reply_comments_id')
      ->get();*/
 //return  $reply;
      //replies
    //  $reply = Reply::all();comments_id()->first()->
  /*  foreach ($comments_data as $data) {
        $comments_id = $data->id;
 //return  $reply;
      }
   $reply = comments::join('replies', 'comments.id', '=', 'replies.reply_comments_id')
    ->where('comments.id',  'reply_comments_id')
    ->get();
    //return  $reply;
foreach ($reply as $data) {
  $id_reply = $data->reply_comments_id;
}*/
          //nav posts
          /* $Entertainment = posts::orderBy('id','desc')
           ->where('cat', 'entertainment')
           ->paginate(4);
           $game = posts::orderBy('id','desc')
           ->where('type', 'Game')
           ->paginate(4);
           $Celebrity = posts::orderBy('id','desc')
           ->where('type', 'Celebrity')
           ->paginate(4);
           //Business_nav posts
           //Entertainment_nav posts
            $Business = posts::orderBy('id','desc')
            ->where('cat', 'Business')
            ->paginate(4);

       return view('readmore',[
         'posts' => $posts ,
         'header'=>$header ,
         'comments' => $comments,
        'Entertainment' => $Entertainment,
        'game' => $game,
        'Celebrity' => $Celebrity,
        'comments_data'=> $comments_data,
        'Business' => $Business,

      ]);*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function videos_view(Request $request)
    {
        if ($request->ajax()) {
            $data = videos::where('id', $request->id)->firstOrFail();

            /*count videos viewer*/
            $count = 'video'. $request->id;
            if (!Session::has($count)) {
                $data->increment('video_view_count');
                Session::put($count, 1);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function img_upload(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
           ]);
        if ($validation->passes()) {
            $id= Auth::user()->id;
            $image = $request->file('select_file');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/users_img'), $new_name);

            User::where('id', $id)->update([
              'img' => $new_name,
            ]);
            return response()->json([
             'message'   => 'Image Upload Successfully',
             'uploaded_image' => '<img src="img/users_img/'.$new_name.'" class=" rounded-circle hoverable" height="230" width="250" />',
             'class_name'  => 'alert-success',
            ]);
        } else {
            return response()->json([
             'message'   => $validation->errors()->all(),
             'uploaded_image' => '',
             'class_name'  => 'alert-danger'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=null)
    {
        /* to delete reply*/
        if (\Route::current()->getName() == 'del_reply') {
            $del = Reply::where('reply_id', $id);

            if (!$del) {
                return back();
            }
            /* delete replies on this reply to*/
            $rep = rep::where('rep_rep_id', $id)->delete();
            $del->delete();
            return back();
        }

        /* delete only reply on reply */
        if (\Route::current()->getName() == 'del_replyOnReply') {
            $del = rep::where('rep_id', $id);
            if (!$del) {
                return back();
            }
            $del->delete();
            return back();
        }

        /* delete comments from chech box and all replies on it*/
        if (request()->has('id')) {
            $id = request('id');
            $del = comments::whereIn('id', $id)->firstOrFail();
        } else {

     /* delete comments and all replies on it*/
            $del = comments::find($id);
            if (!$del) {
                return back();
            }
        }

        $rep   =  rep::where('rep_comments_id', $id)->delete();
        $reply =  Reply::where('reply_comments_id', $id)->delete();
        $del->delete();
        return back();
    }


    /**
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
    public function contact(Request $request)
    {
        if (Auth::check()) {
            contact::UpdateOrCreate([
        'sub' => request('sub'),
        'text' => request('text'),
        'name' => Auth::user()->name,
        'users_id' => Auth::user()->id,
        'email' => Auth::user()->email,
      ]);
            return redirect('/#signup')->with('success', 'Thank You For Your message');
        }

        /* if not auth*/
        $data = Validator::make($request->all(), [
        'name'  => 'required','regex:/^[\p{Arabic}a-zA-Z\- .ـ]+$/u',
        'email' => 'required','string',
        'sub'   => 'required|unique:contacts,sub','string','regex:/^[\p{Arabic}a-zA-Z\- .ـ]+$/u',
        'text'  => 'required',
        //'pass'  => 'required|confirmed',
         ]);

        if ($data->fails()) {
            //lang::setlocale($lang);
            return redirect('/#signup')->withErrors($data)->withInput();
        } else {
            $email= request('email');
            $data = User::where('email', $email)->first();/*firstOrCreate(
                                                       ['name' => 'Flight 10'], ['delayed' => 1]
                                                   );*/

            /*check if the email It belongs to user if belongs to he most be login first
            This method is safer
            */
            if ($data) {
                return redirect('/#signup')->with('user', $email)->withInput();
            }
            $fillable = ['name','email','sub','text'];
            contact::UpdateOrCreate(request($fillable));
            return redirect('/#signup')->with('success', 'Thank You For Your message');
        }
    }


    /**
    * check the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function check(Request $request)
    {
        if (request('email')) {
            $email = request('email');
            $data = User::
      where('email', $email)
      ->count();
            if ($data > 0) {
                echo 'not_unique';
            } else {
                echo 'unique';
            }
        }
    }


    /**
    * checkphone the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function CheckPhone(Request $request)
    {
        if (request('phone')) {
            $phone = request('phone');
            $data = User::
    where('phone', $phone)
    ->count();
            if ($data > 0) {
                echo 'not_unique';
            } else {
                echo 'unique';
            }
        }
    }


    /**
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
    public function comment(Request $request)
    {
        $data = Validator::make($request->all(), [
         'name'  => 'required','string','regex:/^[\p{Arabic}a-zA-Z\- .ـ]+$/u',
         'email' => 'required','email','string',
         'text'  => 'required','string','regex:/^[\p{Arabic}a-zA-Z\- .ـ]+$/u',

      ]);

        if (Auth::check()) {
            comments::Create([
                       'name_comments'  => auth()->user()->name,
                       'email_comments' => auth()->user()->email,
                       'users_id'       => auth()->user()->id,
                       'text_comments'  => request('text'),
                       'posts_id'       => request('id_post')//input,

                       ]);

            return back();
        } elseif ($data->fails()) {
            return back()->withErrors($data)->withInput();
        } else {
            $email= request('email');
            $data= User::where('email', $email)->first();

            /*check if the email It belongs to user if belongs to he most be login first
            This method is safer
            */
            if ($data) {
                return back()->with('user', $data->name)->with('img', $data->img)->withInput();
            }

            comments::Create([
 'name_comments'  => request('name'),
 'email_comments' => request('email'),
 'text_comments'  => request('text'),
 'posts_id'       => request('id_post'),

 ]);
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

  /*->orWhereHas('videos_id//videos_id function in posts model ', function ($query) use ($singular) {
$query->where('title', 'like', '%'.$singular.'%');
})*/

        $search = request('search');
        //check request
        if ($search) {
            //تحويل الجمع للكلمات الي المفرد
            $singular = Str::singular($search);
            //تحويل مفرد الكلمات الي الجمع
            $plural= Str::plural($search);
            //return $plural;
            $data = posts::where('tag', 'like', '%'.$singular.'%')
            ->orWhere('header', 'LIKE', '%'.$singular.'%')
            ->orWhere('p1', 'LIKE', '%'.$singular.'%')
            ->orWhere('author', 'LIKE', '%'.$singular.'%')
            ->orWhere('cat', 'LIKE', '%'.$singular.'%')
            ->orWhere('type', 'LIKE', '%'.$singular.'%')
            ->orWhere('created_at', 'LIKE', '%'.$search.'%')
            ->orderBy('id', 'desc')
            ->paginate(6)
            ->setpath('s?search='.$search);


            if (count($data) > 0) {
                return view('searchlist', [
              'search' => $search,
              'data'   => $data,

            ]);
            } else {
                return view('searchlist', [
               'search' => $search,
               ])->withMessage("No Results found!");
            }
        }
        return abort('404');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search_videos(Request $request)
    {
        /*->orWhereHas('videos', function ($query) use ($singular) {
$query->where('title', 'like', '%'.$singular.'%');
})*/

        $search = request('search');
        //check request
        if ($search) {
            //تحويل الجمع للكلمات الي المفرد
            $singular = Str::singular($search);

            //return $plural;
            $data = videos::where('title', 'like', '%'.$singular.'%')
            ->orWhere('type', 'LIKE', '%'.$singular.'%')
            ->orWhere('created_at', 'LIKE', '%'.$search.'%')
            ->orderBy('id', 'desc')
            ->paginate(8)
            ->setpath('v?search='.$search);

            if (count($data) > 0) {
                return view('videos_searchlist', [
              'search' => $search,
              'data'   => $data,
            ]);
            } else {
                return view('videos_searchlist', [
               'search' => $search,
               ])->withMessage("No Results found!");
            }
        }
        return abort('404');
    }


    /**
     * the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_password(Request $request)
    {
        if (Auth::check()) {
            $email        =  Auth::user()->email;
            $old_password =  request('old_password');
            $new_password =  request('password');

            /*check if password correct*/
            if (password_verify($old_password, Auth::user()->password)) {
                $validatedData = $request->validate([
   'password' => ['required', 'string', 'min:6', 'confirmed'],
    ]);

                User::where('email', $email)->update([
       'password' => bcrypt($new_password),
        ]);

                return back()->with('success', 'Resets Passwords success ');
            } else {
                return back()->with('error', 'invalid Password ! ');
            }
        }
    }

    /**
     * the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function user_comments(Request $request)
    {
        $id = Auth::user()->id;

        $user_comments = comments::where('users_id', $id)->paginate(5);

        $user_reply_count = Reply::where('reply_users_id', $id)->count();

        return view('auth.user_comments', [
       'user_comments' => $user_comments,
       'user_reply_count'    => $user_reply_count,
     ]);
    }



    /**
     * the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function user_contacts(Request $request, $id=null)
    {
        if (\Route::current()->getName() == 'del_contacts') {
            /* delete contacts from chech box */
            if (request()->has('id')) {
                $id = request('id');
                $del = contact::whereIn('id', $id)->delete();
            } else {
                $del = contact::find($id)->delete();
                if (!$del) {
                    return back();
                }
            }

            return back();
        }

        $email = Auth::user()->email;

        $user_contacts = contact::where('email', $email)->paginate(5);

        return view('auth.user_contacts', [
       'user_contacts' => $user_contacts,

     ]);
    }
}
