<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
  protected $fillable = [
    'name',
    'email',
    'sub',
    'text',
    'users_id',
    'status',

    ];


/*
 */protected $dates = ['created_at'];


  public function users_id()
  {
    return $this->hasOne('App\User', 'id', 'users_id');
    
    //{{$data->users_id()->first()->name}}

  }


}
