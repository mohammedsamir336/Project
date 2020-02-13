<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class profile extends Model
{
    use Cachable;//cach package
  
    protected $fillable = [
      'name', 'job', 'about','Website','email','birth',
      'facebook','profile_phone','users_id','admins_id'
  ];


    /*
     */protected $dates = ['birth'];


    public function users()
    {
        return $this->hasOne('App\User', 'id', 'users_id');

        //{{$data->profile_users_id()->first()->name}}
    }

    public function profile_admins_id()
    {
        return $this->hasOne('App\Admin', 'id', 'admins_id');

        //{{$data->profile_admins_id()->first()->header}}
    }
}
