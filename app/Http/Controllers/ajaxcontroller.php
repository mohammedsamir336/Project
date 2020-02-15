<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Admin;
use App\profile;
use App\User;
use App\News;
use App\contact;
use Auth;

class ajaxcontroller extends Controller
{
    /**
     * get news of admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxGetNews()
    {
        $news =   News::orderBy('id', 'desc')->get();
        if ($news) {
            foreach ($news as $data) {
                echo ' <li class="d-flex no-block card-body">
                  <div>
                      <a href="#" class="m-b-0 font-medium p-0 text-dark collapsed" data-toggle="collapse" data-target="#collapseTwo'.$data->id.'" aria-expanded="false" aria-controls="collapseTwo'.$data->id.'">
                          <i class="fa fa-check-circle w-30px m-t-5"></i>
                          <span>'.$data->title.'</span>
                      </a>

                      <span class="text-muted ml-4" style="position:relative;left:10px">'.Str::words($data->text, 5, "...").'</span>


                      <div id="collapseTwo'.$data->id.'" class="collapse" aria-labelledby="headingTwo'.$data->id.'">
                          <div class="card-body">
                              <span><a href="#" class="text-dark"> By: <b>'.$data->news_admins_id()->first()->name.'</b></a></span>
                              <span class="mb-3">'.$data->text.'</span>
                          </div>';
                //only superadmins and the admins how add the news can be delete it
                if (Auth::guard('admin')->user()->id == $data->admins_id || Auth::guard('admin')->user()->superadmin != 0) {
                    echo'<button class="btn btn-danger btn-rounded btn-sm my-0"><a href="'.url("/admin/DelNews".$data->id).'" class="btn btn-danger btn-rounded btn-sm my-0 text-dark">Delete</a></button>';
                }
                echo '</div>
                      </div>
                      <div class="ml-auto">
                          <div class="tetx-right">
                              <h5 class="text-muted font-16">'.$data->created_at->format("dM").'</h5>

                          </div>
                      </div>
                      <div class="border-top">
                      </div>
                  </li>
                <div class="border-top">
                </div>';
            }
            //if No news found
        } else {
            echo '<li class="d-flex no-block card-body">
            <span>No news found</span>
        </li>';
        }
    }


    //notify for new message in admin header
    public function notifyMessage()
    {
        $count = contact::where('status', 0)->count();
        return $count;
    }

    //get new message by ajax in admin footer
    public function getNewMessage(Request $request)
    {
        $contacts = contact::orderBy('id', 'desc')
                      ->limit(5)
                      ->get();


        foreach ($contacts as $message) {
            /*if Not read message background will be gray
                 if message read*/
            if ($message->status) {
                echo '<li class="notification-box ">
                  <div class="row">
                      <div class="col-lg-3 col-sm-3 col-3 text-center ">';
                //if users
                if ($message->users_id) {
                    if (file_exists("img/users_img/".$message->users_id()->first()->img)) {
                        echo '<img class="w-50 rounded-circle" src="'.asset("img/users_img/".$message->users_id()->first()->img).'" alt="avatar" height="51px">';
                    //if img users from socialite
                    } else {
                        echo '<img class="w-50 rounded-circle" src="'.$message->users_id()->first()->img.'" alt="avatar" height="51px">';
                    }
                    //if guest
                } else {
                    echo  '<div class="msgw-Avatar msgw-Avatar--sm msgw-Avatar--black ml-4">'.strtoupper(mb_substr($message->name, 0, 1, "utf-8")).'</div>';
                }
                echo '</div>
                <div class="col-lg-8 col-sm-8 col-8 ">
                    <a href="'.url('admin/message/read '.$message->id).'"><strong class="text-info">'.$message->name.'</strong>
                        <div class="text-dark">
                            '.$message->sub.'
                        </div>
                        <small class="text-warning">'.$message->created_at->format('dD M Y h:sA').', '.$message->created_at->longAbsoluteDiffForHumans().' <!-- diffForHumans(null,true,true) --></small>
                    </a>
                </div>
            </div>
        </li>';
            //if Not read message background will be gray
            } else {
                echo '<li class="notification-box bg-gray">
              <div class="row">
                  <div class="col-lg-3 col-sm-3 col-3 text-center ">';
                if ($message->users_id) {
                    if (file_exists("img/users_img/".$message->users_id()->first()->img)) {
                        echo '<img class="w-50 rounded-circle" src="'.asset("img/users_img/".$message->users_id()->first()->img).'" alt="avatar" height="51px">';
                    } else {
                        echo '<img class="w-50 rounded-circle" src="'.$message->users_id()->first()->img.'" alt="avatar" height="51px">';
                    }
                } else {
                    echo  '<div class="msgw-Avatar msgw-Avatar--sm msgw-Avatar--black ml-4">'.strtoupper(mb_substr($message->name, 0, 1, "utf-8")).'</div>';
                }
                echo '</div>
                  <div class="col-lg-8 col-sm-8 col-8 ">
                      <a href="'.url('admin/message/read '.$message->id).'"><strong class="text-info">'.$message->name.'</strong>
                          <div class="text-dark">
                              '.$message->sub.'
                          </div>
                          <small class="text-warning">'.$message->created_at->format('dD M Y h:sA').', '.$message->created_at->longAbsoluteDiffForHumans().' <!-- diffForHumans(null,true,true) --></small>
                      </a>
                  </div>
              </div>
          </li>';
            }
        }
    }
    // for notify new message number with no refresh page in admin header
  /*  public function notify()
    {
        if (auth()->guard('admin')->check()) {
            // code...
            $response = new StreamedResponse();
            $response->headers->set('Content-Type', 'text/event-stream');
            $response->headers->set('Cache-Control', 'no-cache');
            $response->setCallback(
                function () {
                    //  echo "retry: 100\n\n"; // no retry would default to 3 seconds.
                    $count = contact::where('status', 0)->count();

                    echo "data: {$count}\n\n";
                    ob_flush();
                    //flush();
                    /*header('Content-Type: text/event-stream');
                    header('Cache-Control: no-cache');
                    $count = contact::where('status', 0)->count();
                    echo "data: {$count}\n\n";
                    flush();
                }
            );
            $response->send();
        }
    }*/
}
