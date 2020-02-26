<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function contacts()
    {
        return $this->hasMany( Contact::class );
    }

    public function labels()
    {
        return $this->hasMany( Label::class );
    }

    public function udata()
    {
        return $this->hasOne( Udata::class );
    }

    public function services()
    {
        return $this->hasMany( Service::class );
    }

    public function roles()
    {
        return $this->belongsToMany( Role::class )->withPivot( 'name' )->withTimestamps();
    }

}
