<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class events extends Model
{
    use Cachable;//cach package

    protected $fillable = [
        'title','start','end','checked',

    ];


    protected $dates = [
        'delete_at','created_at','start','end',
    ];
}
