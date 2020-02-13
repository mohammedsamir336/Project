<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Reply extends Model
{
    use Cachable;//cach package
    
    /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
    protected $fillable = [
          'reply','name_reply','reply_users_id','reply_comments_id','email_reply',
    ];


    /*
     */protected $dates = ['created_at'];


    public function reply_users_id()
    {
        return $this->hasOne('App\User', 'id', 'reply_users_id');

        //{{$data->reply_users_id()->first()->name}}
    }


    public function comments_id()
    {
        return $this->hasOne('App\comments', 'id', 'reply_comments_id');

        //{{$data->comments_id()->first()->name}}
    }

    /*  public function rep()
      {
        return $this->hasMany('App\rep', 'rep_rep_id', 'reply_id');

        //{{$data->rep()->first()->text}}

      }*/
}
