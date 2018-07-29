<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Potentials extends Model
{
    protected $fillable = ['industry_id' ,'firstname' ,'lastname' ,'companyname' ,'position' ,'phone' ,'side' ,'address' ,'email' ,'password' ,'user_id' ,'from_site' ,'from_site_id'];

    public function industry() {
    	return $this->belongsTo('App\Industries' ,'industry_id');
    }

    public function SetSideAttribute($v) {
    	$this->attributes['side'] = 'Company';
    }

    public function SetPasswordAttribute($v) {
    	$this->attributes['password'] = bcrypt($v);
    }

    public function profile() {
        return $this->hasOne('App\Profiling' ,'potential_id');
    }

    public function feedbacks() {
        return $this->hasMany('App\Feedbacks' ,'potential_id');
    }

    public function assigned() {
        return $this->belongsTo('App\User' ,'user_id');
    }

    public function connections() {
        return $this->hasMany('App\PotentialConnections' ,'potential_id');
    }
}
