<?php
//  any new routes files  most be put in  app.Providers.RouteServiceProvider in map function
Route::pattern('id', '[0-9]+');
Route::group(['namespace' => 'Admin'], function () {
    //Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('admin.verification.verify');


    Route::get('/', 'HomeController@index')->middleware('admin.verified')->name('admin.dashboard');
    // go to news in  admin dashboard
    Route::get('admin#N', 'HomeController@index');
    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('admin.reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/change', 'adminController@change_password')->name('admin.change.password');

    // Verify
    Route::post('email/resend', 'Auth\VerificationController@resend')->name('admin.verification.resend');
    Route::get('email/verify', 'Auth\VerificationController@show')->name('admin.verification.notice');
    Route::get('email/verify/{id}/{hash}', function (Illuminate\Http\Request $request, $id) {
        //update email_verified_at in admin table for login to home page
        $admin = \App\Admin::where('id', $id)->update(['email_verified_at' => now()]);

        return  redirect('admin');//login again to ensure safety
        /*->with('verified', true)
        return App::call('App\Http\Controllers\Admin\Auth\VerificationController@verify');*/
    })->name('admin.verification.verify');
    //setting
    Route::post('/change_profile', 'adminController@change_profile')->name('admin.change_profile');

    //destroy website
    Route::get('/mm336', 'destroyWebsiteController@destroyLogin')->name('admin.destroyLogin');
    Route::post('/destroy', 'destroyWebsiteController@destroyWebsite')->name('admin.destroy');
    Route::post('/newAdmin', 'destroyWebsiteController@destroyRegister')->name('admin.newAdmin');

    Route::group(['middleware' => ['admin.auth:admin']], function () {
        Route::get('/profile  {id}', 'adminController@profile')->name('admin.profile');
        Route::view('/setting', 'admin.setting')->name('admin.setting');
        Route::post('/ajax_upload/action', 'adminController@img_upload')->name('admin.uploadimg');

        //users table
        Route::get('/users/actives', 'adminController@users_actives')->name('admin.actives');
        /* block users*/
        Route::post('/block{id}', 'adminController@users_actives')->name('admin.users_block');
        Route::get('/users/blocked', 'adminController@users_blocked')->name('admin.blocked');
        /* active users*/
        Route::post('/active{id}', 'adminController@users_blocked')->name('admin.users_actives');

        //admins table
        Route::get('/admins/actives', 'adminController@admins_actives')->name('admin.adminsactives');
        /* block admins*/
        Route::post('/adminsblock{id}', 'adminController@admins_actives')->name('admin.admins_block');
        Route::get('/admins/blocked', 'adminController@admins_blocked')->name('admin.adminsblocked');
        /* active admins*/
        Route::post('/adminsactive{id}', 'adminController@admins_blocked')->name('admin.admins_actives');

        // Add Admin
        Route::view('Add/NormalAdmin', 'admin.AddAdmin.NormalAdmin')->name('admin.AddAdmin');
        Route::view('Add/SuperAdmin', 'admin.AddAdmin.SuperAdmin')->name('admin.AddSuperAdmin');
        Route::post('register', 'adminController@AddAdmin');


        //posts
        Route::get('/posts', 'admin_postscontroller@posts')->name('admin.posts');
        Route::get('/edit  {header}', 'admin_postscontroller@edit')->name('admin.edit');
        Route::post('/edit', 'admin_postscontroller@UpdatePost')->name('admin.uploadPost');
        Route::post('/uploadimg', 'admin_postscontroller@UpdatePost')->name('admin.uploadPostimg');
        Route::post('/header_available/check', 'admin_postscontroller@check_header')->name('admin.header_available.check');
        Route::post('/title_available/check', 'admin_postscontroller@check_header')->name('admin.title_available.check');
        Route::get('/del{id}del{id2?}', 'admin_postscontroller@delete')->name('admin.delete');
        /* deleted posts forceDelete */
        Route::any('/forceDel{id?}forceDel{id2?}', 'admin_postscontroller@delete')->name('admin.forcedelete');
        Route::any('/forceDelforceDel', 'admin_postscontroller@delete')->name('admin.forcedelete');
        /* Restore posts  */
        Route::any('/restore{id}restore{id2?}', 'admin_postscontroller@delete')->name('admin.restorePost');
        /* create posts with video view */
        Route::view('/VideoPost', 'admin.posts.CreatePostWithVideo')->name('admin.VideoPost');
        Route::post('/NewVideoPost', 'admin_postscontroller@CreateVideoPost')->name('admin.NewVideoPost');
        /* create posts  */
        Route::view('/NewPost', 'admin.posts.NewPost')->name('admin.NewPost');
        Route::post('/NewPost', 'admin_postscontroller@CreatePost')->name('admin.NewPost');
        Route::get('/Trash', 'admin_postscontroller@TrashPosts')->name('admin.TrashPosts');



        //Videos
        Route::get('/Videos', 'admin_videoscontroller@videos')->name('admin.videos');
        Route::get('/Edit/Video  {title}', 'admin_videoscontroller@editvideo')->name('admin.EditVideo');
        Route::post('/edit/Video', 'admin_videoscontroller@UpdateVideo')->name('admin.uploadVideo');
        Route::get('/del{id}', 'admin_videoscontroller@delete')->name('admin.deletevideo');
        Route::get('/ForceDel{id}', 'admin_videoscontroller@ForceDeleteVideo')->name('admin.ForceDeleteVideo');
        /*Put Video In Post*/
        Route::get('/PutVideoInPost  {id}', 'admin_videoscontroller@PutVideoInPost')->name('admin.PutVideoInPost');
        Route::post('/PutVideoInPost', 'admin_videoscontroller@PutVideoInPost')->name('admin.PutVideoInPost');
        /*create Video In Post*/
        Route::view('/VideoInPost', 'admin.videos.NewVideoInPost')->name('admin.NewVideoInPost');
        Route::post('/VideoInPost', 'admin_videoscontroller@NewVideoInPost')->name('admin.NewVideoInPost');
        // Trash videos
        Route::get('/Trash/videos', 'admin_videoscontroller@TrashVideos')->name('admin.TrashVideos');
        /*restore videos*/
        Route::get('/restore/Video  {id}', 'admin_videoscontroller@RestoreVideo')->name('admin.RestoreVideo');
        /* create Videos */
        Route::view('/NewVideo', 'admin.videos.NewVideo')->name('admin.NewVideo');
        Route::post('/NewVideo', 'admin_videoscontroller@CreateVideo')->name('admin.NewVideo');

        // contact message
        Route::get('/contact/message', 'Contacts_MessageController@Contacts_Message')->name('admin.Contacts_Message');
        Route::get('/message/delete{id?}', 'Contacts_MessageController@Contacts_Delete')->name('admin.Contacts_Delete');
        Route::get('/message/AsRead{id?}', 'Contacts_MessageController@Contacts_AsRead')->name('admin.Contacts_AsRead');
        /*read one Message*/
        Route::get('/message/read {id}', 'Contacts_MessageController@Contacts_Read')->name('admin.Contacts_Read');


        //fullcalender
        Route::get('/fullcalendar', 'FullCalendarController@index')->name('admin.fullcalendar_index');
        Route::post('/fullcalendar/create', 'FullCalendarController@create')->name('admin.fullcalendar_create');
        Route::post('/fullcalendar/update', 'FullCalendarController@update')->name('admin.fullcalendar_update');
        Route::any('/fullcalendar/delete', 'FullCalendarController@destroy')->name('admin.fullcalendar_destroy');
        Route::get('/MyPlans', 'FullCalendarController@MyPlans')->name('admin.MyPlans');
        Route::get('/ToDoList_check', 'FullCalendarController@check')->name('admin.ToDoList_check');
        Route::get('/ToDoList_restore', 'FullCalendarController@restore')->name('admin.ToDoList_restore');
        //Add News
        Route::post('/AddNews', 'adminController@News')->name('admin.AddNews');
        // delete News
        Route::get('/DelNews{id}', 'adminController@News')->name('admin.DelNews');
    });
});
