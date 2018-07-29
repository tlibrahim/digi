<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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

    public function SetPasswordAttribute($p) {
        $this->attributes['password'] = bcrypt($p);
    }

    public function positions() {
        return $this->hasMany('App\UserPositions' ,'user_id');
    }

    public function potentials() {
        return $this->hasMany('App\Potentials' ,'user_id');
    }
}
