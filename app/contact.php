<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class contact extends Model
{
    use Cachable;//cach package


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
