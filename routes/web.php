<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*vendor\laravel\framework\src\Illuminate\Routing\RouteCollection.php:256
 *this for handle routes error  import */
//pattern
//->where(['{phone}' => '[0-9]+', 'name' => '[a-z]+']);

/* Request::segment(1 or 2 or 3) to get routes url  in blade view*/
//singleton To public share data in views or anything else


app()->singleton('TestTon', function () {
    return 'hi from singleton'; //in blade view {{app('TestTon')}}
  //return view('home'); //in blade view {!!app('TestTon') !!}
});

   //cache Route test
  /*Route::get('cache', function () {
    $value = \Cache::remember('comments', 1, function () {
        return \DB::table('comments')->get();
    });
    /*\Cache::put('ss', 'sadsa');
    return $value = \Cache::get('ss');
    return  \Cache::pull('comments');
     });*/

      Route::pattern('id', '[0-9]+');
      //Route::pattern('name','[a-z]+');
      Route::view('/', 'welcome')->name('welcome');
        Route::get('test', function () {
            $viedos = \App\videos::orderBy('id', 'asc')->first();
            return view('test', ['videos' => $viedos]);
        });
      /*Route::get('test', function () {
          $replies = rep::orderBy('rep_id', 'asc')
                            ->join('comments', 'comments.id', '=', 'rep_comments_id')
                            ->join('replies', 'replies.reply_id', '=', 'rep_rep_id')
                            ->where('rep_id', 1)->get();
          return  $replies;
      });*/

Route::group(['middleware' => 'language'], function () {
    Auth::routes(['verify' => true]);
    Route::get('/home', 'HomeController@index')->name('home');

    //check email Ajax
    Route::post('/email_available/check', 'indexcontroller@check')->name('email_available.check');
    //check phone Ajax
    Route::post('/phone_available/check', 'indexcontroller@CheckPhone')->name('phone_available.check');
    //  one video view
    Route::get('/video', 'indexcontroller@videos_view')->name('video');

    //nexmo
    Route::get('/nexmo', 'NexmoController@show')->name('nexmo');
    Route::post('/nexmo', 'NexmoController@verify')->name('nexmo');
    Route::get('/nexmo/{phone}', 'NexmoController@resendcode');//->where('phone','[0-9]+');

    //login socialite
    Route::get('login/facebook', 'Auth\LoginController@redirectTofacebook')->name('facebook');
    Route::get('login/facebook/callback', 'Auth\LoginController@facebookProviderCallback');

    Route::get('login/google', 'Auth\LoginController@redirectTogoogle')->name('google');
    Route::get('login/google/callback', 'Auth\LoginController@googleProviderCallback');

    Route::get('login/github', 'Auth\LoginController@redirectTogithub')->name('github');
    Route::get('login/github/callback', 'Auth\LoginController@githubProviderCallback');

    //index controller
    Route::post('/contact', 'indexcontroller@contact')->name('contact');
    Route::view('/#contact', 'welcome')->name('welcom_contact');
    Route::get('/read = {header}', 'indexcontroller@allposts')->name('readmore');
    Route::get('/categ = {header}', 'indexcontroller@allposts')->name('category');
    Route::get('/{category} = {type}', 'indexcontroller@type')->name('type');
    Route::view('videos', 'videos_category');

    /* comments route*/
    Route::any('/del_comment{id?}', 'indexcontroller@destroy')->name('del_comment');
    Route::get('/del_reply{id}', 'indexcontroller@destroy')->name('del_reply');
    Route::get('/del_rep{id}', 'indexcontroller@destroy')->name('del_replyOnReply');
    Route::post('/comment', 'indexcontroller@comment')->name('comment');
    Route::post('/reply={id}', 'indexcontroller@reply')->name('reply');
    Route::post('/rep={id}={id2}', 'indexcontroller@reply')->name('repOnrep');

    /* search*/
    Route::any('/s', 'indexcontroller@search')->name('search');
    Route::any('/v', 'indexcontroller@search_videos')->name('search_videos');

    //LoadMore
    Route::post('/loadmore/load_data', 'LoadMoreController@load_data')->name('loadmore.load_data');

    //profile
    Route::get('p  {email}', 'indexcontroller@allposts')->name('profile');

    Route::group(['middleware' => ['auth']], function () {

  //setting
        Route::view('/setting', 'auth.user_setting')->name('setting');
        Route::post('/ajax_upload/action', 'indexcontroller@img_upload')->name('uploadimg');
        Route::post('/change', 'indexcontroller@change_password')->name('change_password');
        Route::post('/change_profile', 'indexcontroller@change_profile')->name('change_profile');
        //  users show
        Route::get('/comments', 'indexcontroller@user_comments')->name('user_comments');
        Route::get('/contacts', 'indexcontroller@user_contacts')->name('user_contacts');
        Route::any('/del_contacts{id?}', 'indexcontroller@user_contacts')->name('del_contacts');
    });

    //test mail (php artisan make:mail )
    Route::get('/TestMail/{email}', function ($email) {
        Mail::to($email)->send(new \App\Mail\testmail());
        return back();
    });
});

// notify for new message
Route::get('/notifyMessage', 'ajaxcontroller@notifyMessage');
// get new message by ajax in admin footer
Route::post('/getNewMessage', 'ajaxcontroller@getNewMessage');
//ajaxGetNews
Route::post('/ajaxGetNews', 'ajaxcontroller@ajaxGetNews');

 /*Route::namespace('admin')->prefix('admin')->name('admin.')->group(function ()
 {
   Route::resource('/users','usercontroller',['except'=> ['show','create','store']]);
 });*/

//test delete with foreignkeys colum enableForeignKeyConstraints in (App\Providers\AppServiceProvider)
      /*Route::get('/D',function () {
        $d= \App\User::where('id',)->delete();
        return back();
      });*/
/*Route::get('/download/{name}', function ($name = null) {
    $localFile = storage_path().'movies';
     return copy($name, $localFile);
    $image->move(public_path('indexfolder/images/'), $name);

    $remoteFile = 'https://www.youtube.com/watch?v=c4274AHyFlU';
    $localFile = storage_path().'movies';
    copy($remoteFile, $localFile);
    return response()->download( $filename ?? '');

    return  response()->download(public_path('img/'.$name));
});*/

/*Route::get('up', function () {
    //$f = (storage_path().'/framework/down');//\File::delete($f);
    Artisan::call('up');
    return view('welcome');
});*/
