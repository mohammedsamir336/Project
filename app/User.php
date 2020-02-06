<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;


    /*  protected static function boot()
{
      parent::boot();

      static::creating(function ($query) {
          $query->online_at = Carbon::now()->addMinutes(10);
      });
}*/

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone','img','password','api_token','locale'

    ];


    protected $dates = [
            'online_at',
            'email_verified_at',
            'blocked_date',
            'phone_verified_at',
            'created_at'
          ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','api_token','phone_verified_at',
        'blocked_date','email_verified_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
