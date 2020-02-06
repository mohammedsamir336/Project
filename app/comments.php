<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          'text_comments','name_comments','users_id','posts_id','email_comments',
    ];


    /*
     */protected $dates = ['created_at'];


    public function users()
    {
      return $this->hasOne('App\User', 'id', 'users_id');

      //{{$data->users_id()->first()->name}}

    }


    public function posts_id()
    {
      return $this->hasOne('App\posts', 'id', 'posts_id');

      //{{$data->posts_id()->first()->header}}

    }

  /*  public function replaies()
    {
      return $this->hasMany('App\Reply', 'reply_comments_id', 'id');

      //{{$data->replaies()->first()->text}}

    }*/

  }
