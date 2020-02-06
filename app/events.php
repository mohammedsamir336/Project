<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class events extends Model
{


    protected $fillable = [
        'title','start','end','checked',

    ];


    protected $dates = [
        'delete_at','created_at','start','end',
    ];



}
