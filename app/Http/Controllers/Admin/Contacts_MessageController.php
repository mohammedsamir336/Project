<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\contact;

class Contacts_MessageController extends Controller
{

  /**
   * Contacts_Message a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
    public function Contacts_Message()
    {
        $contact = contact::all();
        $count   = contact::count();

        return view('admin.Contacts_Message', [
       'count'   => $count,
       'contact' => $contact
     ]);
    }

    /**
     * Contacts_Delete a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Contacts_Delete($id = null)
    {
        /*from tables delete all*/
        if (request()->has('AllDel')) {
            $del = contact::orderBy('id')->delete();
            return back()->with('success', 'deleted success');
        }

        /*from tables delete checked only*/
        if (request()->has('del') and request()->has('id')) {
            $del = contact::whereIn('id', request('id'))->delete();
            return back()->with('success', 'deleted success ');
        } elseif (!$id) {
            return back();
        }

        /*from tables*/
        $del = contact::findOrFail($id)->delete();
        /*if delete message from read message page view */
        if (request()->has('From_ReadMessage')) {
            return redirect('admin/contact/message')->with('success', 'Message deleted successfully ');
        }
        return back()->with('success', 'Message deleted successfully ');
    }


    /**
     * Contacts_AsRead a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Contacts_AsRead($id = null)
    {
        /* Mark as read from nav header in header view*/
        if (!$id) {
            $Read = contact::where('status', 0)->update(['status' => 1]);
            return back();
        }
        /*from tables*/
        $Read = contact::findOrFail($id)->update(['status' => 1]);
        return back();
    }

    /**
     * Contacts_Read a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Contacts_Read($id = null)
    {
        $message = contact::findOrFail($id);
        $status  =  contact::findOrFail($id)->update(['status' => 1]);
        return view('admin.Message_Read', ['message' => $message ]);
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
