<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;

/*in Illuminate\Foundation\Auth\AuthenticatesUsers (sendFailedLoginResponse)
   where go if Validation fail*/

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * Where to redirect users after login.
     *
     * @var string
     */ /*changes direct to go back after login
         *in Illuminate\Foundation\Auth\AuthenticatesUsers function sendLoginResponse*/
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectTofacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function facebookProviderCallback()
    {
        $userSocial = Socialite::driver('facebook')->user();

        $finduser= User::where('email', $userSocial->email)->first();

        if ($finduser) {
            $user = $finduser;
        } else {
            $user = new User;
            $user->name = $userSocial->getName();
            $user->email = $userSocial->getEmail();
            $user->password = bcrypt(1357999);
            $user->img = $userSocial->getAvatar();
            $user->save();
        }
        Auth::login($user);
        return  redirect($this->redirectTo);
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectTogoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function googleProviderCallback()
    {
        $userSocial = Socialite::driver('google')->user();

        $finduser= User::where('email', $userSocial->email)->first();

        if ($finduser) {
            $user = $finduser;
        } else {
            $user = new User;
            $user->name = $userSocial->getName();
            $user->email = $userSocial->getEmail();
            $user->password = bcrypt(1357999);
            $user->img = $userSocial->getAvatar();
            $user->save();
        }
        Auth::login($user);
        return back();
    }


    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectTogithub()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function githubProviderCallback()
    {
        $userSocial = Socialite::driver('github')->user();

        $finduser= User::where('email', $userSocial->email)->first();

        if ($finduser) {
            $user = $finduser;
        } else {
            $user = new User;
            $user->name = $userSocial->getName();
            $user->email = $userSocial->getEmail();
            $user->password = bcrypt(1357999);
            $user->img = $userSocial->getAvatar();
            $user->save();
        }
        Auth::login($user);
        return back();
    }
}
