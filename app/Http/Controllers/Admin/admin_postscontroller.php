<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Admin;
use App\User;
use App\posts;
use App\videos;
use App\comments;
use App\Reply;
use App\rep;
use Session;
use Embed\Embed;
use Embed\Http\DispatcherInteface;
use Embed\Http\Url;
use Embed\Http\Response;
use Embed\Http\ImageResponse;

class admin_postscontroller extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
    public function posts()
    {
        $posts    =  posts::orderBy('id', 'desc')->get();
        $count    =  posts::whereNull('deleted_at')->count();

        return view('admin.posts.AllPosts', [
          'posts'  =>  $posts,
          'count'  =>  $count,
    ]);
    }


    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $header = null)
    {

//return $request;
        $post =  posts::where('header', $header)->firstOrFail();

        return view('admin.posts.edit', [
            'post'  =>  $post,

      ]);
    }


    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function UpdatePost(Request $request)
    {
        $id = request('id');

        if (\Route::current()->getName() == 'admin.uploadPostimg') {
            $validation = Validator::make($request->all(), [
             'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            if ($validation->passes()) {
                $upload = request('select_file')->getClientOriginalName();
                if (file_exists('indexfolder/images/'.$upload)) {//if  image in folder
              $name = request('select_file')->getClientOriginalName();//get image name
                } else {
                    $image = $request->file('select_file');
                    $name = rand() . '.' . $image->getClientOriginalExtension();//change name
                    $image->move(public_path('indexfolder/images/'), $name);
                }

                posts::where('id', $id)->update([
               'img' => $name,
             ]);
                return response()->json([
              'message'        => 'Image Upload Successfully',
              'uploaded_image' => '<img src="../indexfolder/images/'.$name.'" class="hoverable" height="230" width="250" />',
              'class_name'     => 'alert-success',

             ]);
            } else {
                return response()->json([
              'message'        => $validation->errors()->all(),
              'uploaded_image' => '',
              'class_name'     => 'alert-danger'
             ]);
            }
        }

        $header     = request('header');
        $headerTest = request('headerTest');
        $admin_id   = Auth::guard('admin')->user()->id;
        $video_id   = request('video_id');

        posts::where('id', $id)->update([
             'header' => $header,
             'author' => request('author'),
             'p1'     => request('p1'),
             'p2'     => request('p2'),
             'p3'     => request('p3'),
             'tag'    => request('tag'),
             'type'   => request('type'),
             'cat'    => request('cat'),
             'Admins_id' => Auth::guard('admin')->user()->id,
           ]);


        if (request('video')) {
            /*change video url to embed/ by package */
            $info = Embed::create(request('video'), [
               //'min_image_width' => 50,
               //'min_image_height' => 50,
               'choose_bigger_image' => true,
               'images_blacklist' => 'example.com/*',
               'url_blacklist' => 'example.com/*',
               'follow_canonical' => true,

               'html' => [
                 'max_images' => 10,
                 'external_images' => true
               ],
             ]);
            Videos::where('id', $video_id)->update([
               'video'         => $info->code,//video embed code iframe
               'url'           => $info->url,//video embed url
               'video_img'     => $info->image,//video img
               'title'         => request('title'),
               'type'          => request('type'),
             ]);
        }


        if ($admin_id != 1) {
            $admin = Admin::where('id', $admin_id)->first();
            $points = 'blog_' . $admin_id;
            if (!Session::has($points)) {
                $admin->increment('points');
                Session::put($points, 1);
            }
        }

        return redirect('read = '.$header);
    }



    /**
    * check the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function check_header(Request $request)
    {
        if (\Route::current()->getName() == 'admin.title_available.check') {
            if (request('title')) {
                $title = request('title');
                $data = Videos::where('title', $title)->count();
                if ($data > 0) {
                    echo 'not_unique';
                } else {
                    echo 'unique';
                }
            }
        }


        if (request('header')) {
            $header = request('header');
            $data = posts::
      where('header', $header)
      ->count();
            if ($data > 0) {
                echo 'not_unique';
            } else {
                echo 'unique';
            }
        }
    }


    /**
    * delete the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    /*this function content restore and soft deletes and forceDelete*/
    public function delete($id=null, $id2=null)//posts id , videos id
    {

     /*restore one post*/
        if (\Route::current()->getName() == 'admin.restorePost') {
            $res = posts::where('id', $id)->restore();
            if ($id2) {
                /*restore video post*/
                $video = videos::where('id', $id2)->restore();
            }
            return back()->with('success', 'Post Restore successfully');
        }



        if (\Route::current()->getName() == 'admin.forcedelete') {
            if ($id) {
                /*delete comments on post forceDelete*/
                $comments = comments::where('posts_id', $id)->get();

                foreach ($comments as  $value) {
                    $rep   =  rep::where('rep_comments_id', $value->id)->delete();
                    $reply =  Reply::where('reply_comments_id', $value->id)->delete();
                }

                $comments = comments::where('posts_id', $id)->delete();
                /*delete one post forceDelete*/
                $forceDel = posts::where('id', $id)->forceDelete();

                if ($id2) {
                    videos::where('id', $id2)->forceDelete();
                }




                /*delete  forceDelete from check box*/
            } elseif (request()->has('del') and request()->has('id')) {
                $id  = request('id');
                $id2 = request('videos_id');

                /*get comments for foreach*/
                $comments = comments::whereIn('posts_id', $id)->get();

                foreach ($comments as  $value) {
                    /*delete reply and replies on reply*/
                    $rep   =  rep::where('rep_comments_id', $value->id)->delete();
                    $reply =  Reply::where('reply_comments_id', $value->id)->delete();
                }
                /*delete from checkbox comments on post*/
                $comments = comments::whereIn('posts_id', $id)->delete();
                /*delete from checkbox post*/
                posts::whereIn('id', request('id'))->forceDelete();
                if ($id2) {
                    /*delete videos if found*/
                    videos::whereIn('id', $id2)->forceDelete();
                }




                /*restore from checkbox*/
            } elseif (request()->has('res') and request()->has('id')) {
                /*restore from checkbox*/
                $posts= posts::whereIn('id', request('id'))->restore();
                /*restore from checkbox if post have video*/
                if (request('videos_id')) {
                    $id_Video = request('videos_id');
                    $video = videos::whereIn('id', $id_Video)->restore();
                }
                return back()->with('success', 'Posts successfully Restore ');
            } elseif (!request()->has('id')) {
                return back();
            }
            return back()->with('success', 'Post deleted successfully ');
        } else {
            /*delete one post soft delete*/
            $del = posts::find($id)->delete();
            if ($id2) {
                /*delete video post soft delete*/
                $video = videos::where('id', $id2)
        ->whereNull('deleted_at')
        ->delete();
            }
            return back()->with('success', 'Post has been delete successfully check Trashed posts ');
        }
    }


    /**
    * Create the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function CreateVideoPost(Request $request)
    {
        $validation = Validator::make($request->all(), [
          'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
         ]);

        if ($validation->passes()) {
            $upload = request('select_file')->getClientOriginalName();
            if (file_exists('indexfolder/images/'.$upload)) {//if  image in folder
            $name = request('select_file')->getClientOriginalName();//get image name
            } else {
                $image = $request->file('select_file');
                $name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('indexfolder/images/'), $name);
            }

            $admin_id   = Auth::guard('admin')->user()->id;

            /*change video url to embed/ by package */
            $info = Embed::create(request('video'), [
             //'min_image_width' => 50,
             //'min_image_height' => 50,
             'choose_bigger_image' => true,
             'images_blacklist' => 'example.com/*',
             'url_blacklist' => 'example.com/*',
             'follow_canonical' => true,

                'html' => [
                     'max_images' => 10,
                     'external_images' => true
                 ],
             ]);

            Videos::create([
            'video'         => $info->code,//video embed code iframe
            'url'           => $info->url,//video embed url
            'video_img'     => $info->image,//video img
            'title'     => request('title'),
            'type'      => request('type'),
            'author'    => request('author'),
            'admins_id' => Auth::guard('admin')->user()->id,
          ]);


            $video = Videos::where('title', request('title'))->first();

            posts::create([
            'img'       => $name,
            'header'    => request('header'),
            'author'    => request('author'),
            'p1'        => request('p1'),
            'p2'        => request('p2'),
            'p3'        => request('p3'),
            'tag'       => request('tag'),
            'type'      => request('type'),
            'cat'       => request('cat'),
            'videos_id' => $video->id,
            'admins_id' => $admin_id,
          ]);

            if ($admin_id != 1) {
                $admin = Admin::where('id', $admin_id)->first();
                $admin->increment('projects_count');
                $admin->increment('points', 3);
            }
            return redirect('admin/posts')->with('success', 'Post create successfully ');
        } else {
            return back()->withErrors($validation)->withInput();
        }
    }


    /**
    * delete the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function TrashPosts(Request $request)
    {
        $Trash = posts::onlyTrashed()->get();
        $count =  posts::onlyTrashed()->count();
        return view('admin.posts.TrashPosts', [
         'Trash' => $Trash,
         'count' => $count,
         ]) ;
    }



    /**
    * Create the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function CreatePost(Request $request)
    {
        $validation = Validator::make($request->all(), [
          'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
         ]);

        if ($validation->passes()) {
            $upload = request('select_file')->getClientOriginalName();
            if (file_exists('indexfolder/images/'.$upload)) {//if  image in folder
       $name = request('select_file')->getClientOriginalName();//get image name
            } else {
                $image = $request->file('select_file');
                $name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('indexfolder/images/'), $name);
            }

            $admin_id   = Auth::guard('admin')->user()->id;

            posts::create([
            'img'    => $name,
            'header' => request('header'),
            'author' => request('author'),
            'p1'     => request('p1'),
            'p2'     => request('p2'),
            'p3'     => request('p3'),
            'tag'    => request('tag'),
            'type'   => request('type'),
            'cat'    => request('cat'),
            'admins_id'     => $admin_id,
          ]);

            if ($admin_id != 1) {
                $admin = Admin::where('id', $admin_id)->first();
                $admin->increment('projects_count');
                $admin->increment('points', 3);
            }
            return redirect('admin/posts')->with('success', 'Post create successfully ');
        } else {
            return back()->withErrors($validation)->withInput();
        }
    }
}
