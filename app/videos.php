<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class videos extends Model
{
    use softDeletes;
    use Cachable;//cach package

  
    protected $fillable = [
      'title', 'video', 'video_posts_header','video_view_count',
      'type','video_img','author','admins_id','url'
  ];

    protected $dates = [
      'delete_at','created_at',
  ];

    public function videos_admins_id()
    {
        return $this->hasOne('App\Admin', 'id', 'admins_id');

        //{{$data->videos_admins_id()->first()->name}}
    }

    public function videos()
    {
        return $this->hasMany('App\posts', 'videos_id', 'id');

        //{{$data->videos()->first()->text}}
    }
}
