<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Mail;
use App\User;
use Carbon\Carbon;
use Session;

trait VerifiesEmails
{
    use RedirectsUsers;

    /**
     * Show the email verification notice.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        //Mail::to($request->user()->email)->send(new \App\Mail\testmail());
        /* Session for To ensure that
        the message is not repeated when Presses resend email*/
        if (!Session('user'.$request->user()->id, 1)) {
            //resend mail
            $request->user()->sendEmailVerificationNotification();
        }

        return $request->user()->hasVerifiedEmail()
                        ? redirect($this->redirectPath())
                        : view('auth.verify');
    }

    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function verify(Request $request)
    {      //update email_verified_at in user table for login to home page
        User::where('id', $request->user()->id)->update(['email_verified_at' => now()]);

        if (! hash_equals((string) $request->route('id'), (string) $request->user()->getKey())) {
            throw new AuthorizationException;
        }

        if (! hash_equals((string) $request->route('hash'), sha1($request->user()->getEmailForVerification()))) {
            throw new AuthorizationException;
        }

        if ($request->user()->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect($this->redirectPath())->with('verified', true);
    }

    /**
     * Resend the email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }
        //resend mail
        $request->user()->sendEmailVerificationNotification();

        Session('user'.$request->user()->id, 1);// Session for To ensure that the message is not repeated

        return back()->with('resent', true);
    }
}
