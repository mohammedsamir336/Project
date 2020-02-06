<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;
use App\Admin;
use App\profile;
use App\User;
use App\News;
use image;
use Auth;

class admincontroller extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile($id = null)
    {
        /* I insert into column profile id when admin register
        in Illuminate\Foundation\Auth\RegistersUsers register function
        to get profile by id*/
        if ($id) {
            $profile_data = profile::where('admins_id', $id)->firstOrFail();

            $add_admin_by = Admin::where('add_by', $id)->count();

            return view('admin.profile', [
        'profile_data' => $profile_data,
        'add_admin_by' => $add_admin_by,
      ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function News($id = null)
    {
        /* delete news*/
        if ($id) {
            $del = News::where('id', $id)->delete();
        } else {
            $admins_id = Auth::guard('admin')->user()->id;
            $news      = News::updateOrCreate([
                          'title'    => request('title'),
                          'text'     => request('text'),
                          'admins_id' =>  $admins_id,
                       ]);
        }

        return redirect('admin#News');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function users_actives()
    {
        if (\Route::current()->getName() == 'admin.users_block') {
            $id = request('id');
            if ($id) {
                $data = User::find($id);
                $data->blocked_date = request('block');
                $data->save();
                return back();
            }
        }
        $users = User::orderBy('id', 'desc')->get();
        $count = User::orderBy('id', 'desc')->whereNull('blocked_date')->count();
        return view('admin.users.actives', [
          'users' => $users,
          'count' => $count,
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function users_blocked()
    {
        /* actives users*/
        if (\Route::current()->getName() == 'admin.users_actives') {
            $id = request('id');
            if ($id) {
                $data = User::find($id);
                $data->blocked_date   = null;
                $data->remember_token = request('_token');
                $data->save();
                return back();
            }
        }
        $users = User::orderBy('id', 'desc')->get();
        $count = User::orderBy('id', 'desc')->whereNotNull('blocked_date')->count();
        return view('admin.users.Blocked', [
          'users' => $users,
          'count' => $count,
        ]);
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admins_actives()
    {
        if (\Route::current()->getName() == 'admin.admins_block') {
            $id = request('id');
            if ($id) {
                $data = Admin::find($id);
                $data->blocked_date = request('block');
                $data->save();
                return back();
            }
        }
        $admins = Admin::orderBy('id', 'desc')->get();
        $count  = Admin::where('superadmin', 0)->whereNull('blocked_date')->count();
        return view('admin.admins_table.actives', [
          'admins' => $admins,
          'count' => $count,
        ]);
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admins_blocked()
    {
        /* actives users*/
        if (\Route::current()->getName() == 'admin.admins_actives') {
            $id = request('id');

            if ($id) {
                $data = Admin::find($id);
                $data->blocked_date   = null;
                $data->remember_token = request('_token');
                $data->save();
                return back();
            }
        }
        $admins = Admin::orderBy('id', 'desc')->get();
        $count = Admin::whereNotNull('blocked_date')->count();

        return view('admin.admins_table.Blocked', [
          'admins' => $admins,
          'count' => $count,
        ]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function img_upload(Request $request)
    {

      /* $img = Image::make(public_path('img/admin_img'. imgrequest))->resize(300, 200);
      $img->save*/
        $validation = Validator::make($request->all(), [
        /* for Multiple Upload 'select_file.*' and  make foreach */
            'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
           ]);

        if ($validation->passes()) {
            /*foreach if is array Multiple Upload here */
            $id      = Auth::guard('admin')->user()->id;
            $image    = $request->file('select_file');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/admin_img'), $new_name);

            Admin::where('id', $id)->update([
              'img' => $new_name,
            ]);
            return response()->json([
             'message'   => 'Image Upload Successfully',
             'uploaded_image' => '<img src="../img/admin_img/'.$new_name.'" class=" rounded-circle hoverable" height="230" width="250" />',
             'class_name'  => 'alert-success',
             'logo'   => '<img src="../img/admin_img/'.$new_name.'" class=" rounded-circle hoverable" height="50" width="51" />',
            ]);
        } else {
            return response()->json([
             'message'   => $validation->errors()->all(),
             'uploaded_image' => '',
             'class_name'  => 'alert-danger'
            ]);
        }
    }


    public function change_password(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $email          =  Auth::guard('admin')->user()->email;
            $admin_password =  Auth::guard('admin')->user()->password;
            $old_password   =  request('old_password');
            $new_password   =  request('password');

            /*check if password correct*/
            if (password_verify($old_password, $admin_password)) {
                $validatedData = $request->validate([
       'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

                Admin::where('email', $email)->update([
           'password' => bcrypt($new_password),
            ]);
                return back()->with('success', 'Resets Passwords success ');
            } else {
                return back()->with('error', 'invalid Password !');
            }
        }
    }



    public function change_profile(Request $request)
    {
        $email  =  Auth::guard('admin')->user()->email;

        $data = [
         'name'       => request('name'),
         'job'        => request('job'),
         'about'      => request('about'),
         'Website'    => request('website'),
         'birth_at'   => request('birth'),
         'facebook'   => request('facebook'),
         'profile_phone'=> request('phone'),
          ];

        /* I insert email into profile when admin register in RegisterController*/
        profile::where('email', $email)->update($data);
        return back()->with('success', 'success update profile ');
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
              'add_by'    => auth()->guard('admin')->user()->id,
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
    public function AddAdmin(Request $request)
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

        profile::create($profile);

        //make Super Admin
        if (request()->has('signup')) {
            $SuperAdmin =  Admin::where('email', request('email'))->update(['superadmin'=> 2]);
        }

        return back()->with('success', 'Admin add Successfully');
    }
}
