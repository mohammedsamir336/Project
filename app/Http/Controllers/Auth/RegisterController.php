<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Nexmo;
use session;
use Auth;
use Image;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
        'name' => ['required', 'string', 'max:255','regex:/^[\p{Arabic}a-zA-Z\- .ـ]+$/u'/*"regex:~^[a-z0-9٠-٩\-+,()/'\s\p{Arabic}]{1,60}$~iu"*/],
         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
         'password' => ['required', 'string', 'min:8', 'confirmed'],
       'phone' => ['required',  'min:11', 'max:17','unique:users',/*'regex:/(01)[0-9]{9}/',*//*'regex:/(01)[0-9]{9}/'*/],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

      /* Writing words inside pictures
      $img = Image::make(public_path('img/orange.jpg'));
      $img->text('This is a example ', 120, 100, function($font) {
        $font->file(public_path('AguafinaScript-Regular.ttf'));
        $font->size(100);
        $font->color('#FEFEFE');
        //$font->align('center');
        $font->valign('bottom');
        //$font->angle(90);
    });
     $img->save(public_path('img/orange.jpg'));*/

          return User::create([
              'name'     => $data['name'],
              'email'    => $data['email'],
              'phone'    =>  $data['phone'],
              'password' => bcrypt($data['password']),
              'img'      => 'https://ui-avatars.com/api/?background=0D8ABC&color=fff&length=1&rounded=true&bold=true&size=65&name='.$data['name'],
          ]);



    }


 }
