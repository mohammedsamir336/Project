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
class admin_videoscontroller extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function videos( )
  {

    $videos    =  videos::orderBy('id','desc')->get();
    $count    =  videos::whereNull('deleted_at')->count();

    return view('admin.videos.AllVideos',[
          'videos'  =>  $videos,
          'count'   =>  $count,
    ]);

  }


  /**
   * Edit a listing of the resource.
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function editvideo(Request $request,$title = null)
  {

//return $request;
    $video =  videos::where('title',$title)->firstOrFail();

      return view('admin.videos.editvideo',[
            'video'  =>  $video,

      ]);

  }


  /**
   * Update a listing of the resource.
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function UpdateVideo(Request $request)
  {

    $video_id   = request('video_id');
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

        Videos::where('id', $video_id)->update([
          'video'         => $info->code,//video embed code iframe
          'url'           => $info->url,//video embed url
          'video_img'     => $info->image,//video img
          'title' => request('title'),
          'type'  => request('type'),
          'author' => request('author'),
        ]);

        if ($admin_id != 1) {
       $admin = Admin::where('id', $admin_id)->first();
       $points = 'blog_' . $admin_id;
       if (!Session($points)) {
       $admin->increment('points');
       Session([$points => 1]);
       }
        }

  return redirect('admin/Videos')->with('success','Video Update successfully');


  }



  /**
  * delete the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */

  public function delete($id = null )// videos id
  {


  $del_in_posts = posts::where('videos_id' ,$id)->Update([
    'videos_id'     =>  null,
    'del_videos_id' =>  $id
  ]);
  $del = videos::findOrFail($id)->delete();

  return back()->with('success','Video delete successfully');

 }


 /**
 * ForceDeleteVideo the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */

 public function ForceDeleteVideo($id = null )// videos id
 {


 $ForceDelete_in_posts = posts::where('del_videos_id' , $id)
                       ->Update(['del_videos_id' =>  null]);

 $del = videos::where('id',$id)->forceDelete();
  if (!$del) {
  return abort('404');
   }
 return back()
         ->with('success','Video force delete successfully');

 }



/**
* Trash the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/

public function TrashVideos(Request $request )
{
   $Trash = videos::onlyTrashed()->get();
    $count =  videos::onlyTrashed()->count();
     return view('admin.videos.TrashVideos',[
       'Trash' => $Trash,
       'count' => $count,
       ]) ;
}



/**
* RestoreVideo the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/

public function RestoreVideo(Request $request ,$id = null )
{

   /*restore one video*/
      $res_video_post = posts::where('del_videos_id',$id)->Update([
        'videos_id'     =>  $id,
        'del_videos_id' =>  null
      ]);

     $video = videos::where('id',$id)->restore();
     if (!$video) {
       return abort('404');
     }
     return back()->with('success','Video Restore successfully');

}


/**
* CreateVideo the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/

public function CreateVideo()
{

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

  videos::create([
    'author'        => request('author'),
    'title'         => request('title'),
    'video'         => $info->code,//video embed code iframe
    'url'           => $info->url,//video embed url
    'video_img'     => $info->image,//video img
    'type'          => request('type'),
    'admins_id'     => $admin_id,
  ]);

if ($admin_id != 1) {
$admin = Admin::where('id', $admin_id)->first();
$admin->increment('projects_count');
$admin->increment('points',2);

}


return  redirect('admin/Videos')
        ->with('success','Video create successfully');

}


/**
* VideoInPost the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/

public function NewVideoInPost($id = null)
{

  $admin_id   = Auth::guard('admin')->user()->id;
  /*request create is create video button*/
 if (request()->has('create')) {
  /* check if post has video already*/
  $post = posts::where('header' , request('header') )->first();
  if ($post->videos_id) {
  return back()->withErrors('')->withInput(); //confirm('Are you sure you want to save this thing into the database?');
   }
 }

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

  videos::create([
    'author'        => request('author'),
    'title'         => request('title'),
    'video'         => $info->code,//video embed code iframe
    'url'           => $info->url,//video embed url
    'video_img'     => $info->image,//video img
    'type'          => request('type'),
    'admins_id'     => $admin_id,
  ]);

  $video = videos::where('title',request('title'))->first();
  /* put video id in posts table*/
  $post   = posts::where('header' , request('header') )->Update(['videos_id' => $video->id]);

  if ($admin_id != 1) {
  $admin = Admin::where('id', $admin_id)->first();
   $admin->increment('projects_count');
  $admin->increment('points',2);
  }



return  redirect('admin/Videos')->with('success','Video create successfully');

}


/**
* PutVideoInPost the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/

public function PutVideoInPost($id = null)
{

  /*request create is create video button*/
 if (request()->has('create')) {
  /* check if post has video already*/
  $post = posts::where('header' , request('header') )->first();
  if ($post->videos_id) {
  return back()->withErrors('')->withInput(); //confirm('Are you sure you want to save this thing into the database?');
   }
   $post   = posts::where('header' , request('header') )->Update(['videos_id' => request('id')]);
   return  redirect('admin/Videos')->with('success','Video Put in post successfully');
 }
  /*when click on continue button in PutVideoInPost page to put video in post*/
  if (request()->has('Continue')) {
  $post   = posts::where('header' , request('header') )->Update(['videos_id' => request('id')]);
  return  redirect('admin/Videos')->with('success','Video Put in post successfully');
  }

  $video = videos::findOrFail($id);
  return view('admin.videos.PutVideoInPost',['video' => $video]);


}











}
