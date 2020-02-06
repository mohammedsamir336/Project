<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rep extends Model
{

    /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
      protected $fillable = [
            'reptext','name_rep','rep_users_id','rep_comments_id','email_rep','rep_rep_id',
      ];

      /*
       */protected $dates = ['created_at'];


      public function RepUsers()
      {
        return $this->hasOne('App\User', 'id', 'rep_users_id');

        //{{$data->rep_users_id()->first()->name}}

      }


      public function comments_id()
      {
        return $this->hasOne('App\comments', 'id', 'rep_comments_id');

        //{{$data->comments_id()->first()->name}}

      }

      public function rep_rep_id()
      {
        return $this->hasOne('App\Reply', 'reply_id', 'rep_rep_id');

        //{{$data->reply_users_id()->first()->name}}

      }

}
