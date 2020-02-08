<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Nexmo;
use App\User;
use session;

class NexmoController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    *
    *
    */
    public function show()
    {
        if (!auth()->user()->phone_verified_at) {
            return view('nexmo');
        }
        return redirect('home');
    }


    public function verify(Request $request)
    {
        $this->validate($request, [
             'code' => 'size:4'
         ]);

        try {
            $request_id = session('nexmo_request_id');

            $verification = new \Nexmo\Verify\Verification($request_id);

            Nexmo::verify()->check($verification, $request->code);

            $date = date_create();

            User::where('id', auth()->id())->update(['phone_verified_at' => date_format($date, 'Y-m-d H:i:s')]);

            return redirect('/home');
        } catch (Nexmo\Client\Exception\Request $e) {
            return back()->withErrors([
                    'code' => $e->getMessage()
                ]);
        }
    }


    /**
           * resend the form for editing the specified resource.
           *
           * @param  \Illuminate\Http\Request  $request
           * @param  int  $id
           * @return \Illuminate\Http\Response
           */
    public function resendcode($phone)
    {
        try {
            $verification = Nexmo::verify()->start([
                     'number' => $phone,
                     'brand' => 'Phone Verification',
                 ]);

            return back();
        } catch (Nexmo\Client\Exception\Request $e) {
            return back()->withErrors([
                        'code' => $e->getMessage()
                    ]);
        }
    }
}
