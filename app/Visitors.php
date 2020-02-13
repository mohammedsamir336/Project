<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Visitors extends Model
{
    use Cachable;//cach package

  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'visitors','visit_at',

  ];


    protected $dates = [
          'visit_at','created_at'
        ];
}
