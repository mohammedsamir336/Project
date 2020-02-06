<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\contact;
class Contacts_MessageController extends Controller
{

  /**
   * Contacts_Message a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function Contacts_Message( )
  {
     $contact = contact::all();
     $count   = contact::count();

     return view('admin.Contacts_Message',[
       'count'   => $count,
       'contact' => $contact
     ]);
  }

  /**
   * Contacts_Delete a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function Contacts_Delete($id = null )
  {
      /*from tables delete all*/
    if (request()->has('AllDel')) {
    $del = contact::orderBy('id')->delete();
    return back()->with('success','deleted success');
    }

    /*from tables delete checked only*/
    if (request()->has('del') and request()->has('id')) {
    $del = contact::whereIn('id',request('id'))->delete();
    return back()->with('success','deleted success ');
     }elseif (!$id) {
      return back();
       }

    /*from tables*/
     $del = contact::findOrFail($id)->delete();
     /*if delete message from read message page view */
    if ( request()->has('From_ReadMessage')) {
      return redirect('admin/contact/message')->with('success','Message deleted successfully ');
    }
     return back()->with('success','Message deleted successfully ');
  }


  /**
   * Contacts_AsRead a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function Contacts_AsRead($id = null )
  {
    /* Mark as read from nav header in header view*/
    if (!$id) {
    $Read = contact::where('status' , 0)->update(['status' => 1]);
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
  public function Contacts_Read($id = null )
  {

     $message = contact::findOrFail($id);
     $status  =  contact::findOrFail($id)->update(['status' => 1]);
     return view('admin.Message_Read', ['message' => $message ]);

  }


}
