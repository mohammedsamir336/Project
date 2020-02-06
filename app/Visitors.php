<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
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
