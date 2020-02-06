<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'title', 'text', 'admins_id',

  ];


protected $dates = [
          'created_at',
        ];


        public function news_admins_id()
        {
          return $this->hasOne('App\Admin', 'id', 'admins_id');
          
          //{{$data->news_admins_id()->first()->name}}

        }
}
