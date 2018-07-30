<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;

class CrmUser extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','http_cred' ,'ip_address' ,'added_by' ,'edited_by'
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
        $this->attributes['password'] = Hash::make($p);
    }

    public function positions() {
        return $this->hasMany('App\UserPositions' ,'user_id');
    }

    public function potentials() {
        return $this->hasMany('App\Potentials' ,'user_id');
    }

    public function tasks() {
        return $this->hasMany('App\TaskAssign' ,'user_id');
    }
}
