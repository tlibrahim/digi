<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company_User extends Model
{
    protected $fillable = ['company_id' ,'privlage_id' ,'name' ,'phone' ,'email' ,'password' ,'confirmed','confirmation_code','verification_code'];

    public function potential() {
        return $this->belongsTo('App\Companies' ,'company_id');
    }

    public function SetPasswordAttribute() {
    	$this->attributes['password'] = bcrypt(123456);
    }
}
