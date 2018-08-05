<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{           
    protected $fillable = ['industry_id' ,'open_to' ,'open_from' ,'coverphoto' ,'logo' ,'googleplus' ,'instagram' ,'twitter' ,'facebook' ,'website' ,'email' ,'hotline' ,'founded' ,'location_name' ,'location_credential' ,'address' ,'intro' ,'name' ,'isverified' ,'progress'];

    public function industry() {
    	return $this->belongsTo('App\Industries' ,'industry_id');
    }

    public function SetPasswordAttribute($v) {
    	$this->attributes['password'] = bcrypt($v);
    }

    public function SetLogoAttribute($file) {
        if (is_file($file)) {
            $name = str_random(8).'-company-logo.'.$file->getClientOriginalExtension();
            $file->storeAs('public/companies' ,$name);
        } else {
            $name = NULL;
        }
        $this->attributes['logo'] = $name;
    }

    public function SetCoverphotoAttribute($file) {
        if (is_file($file)) {
            $name = str_random(8).'-company-coverphoto.'.$file->getClientOriginalExtension();
            $file->storeAs('public/companies' ,$name);
        } else {
            $name = NULL;
        }
        $this->attributes['coverphoto'] = $name;
    }

    public function profile() {
        return $this->hasOne('App\Profiling' ,'potential_id');
    }

    public function feedbacks() {
        return $this->hasMany('App\Feedbacks' ,'potential_id');
    }
    
    public function meeting() {
        return $this->hasOne('App\MeetingFeedback' ,'company_id');
    }

    public function connections() {
        return $this->hasMany('App\Company_User' ,'company_id');
    }

    public function projects() {
        return $this->hasMany('App\Projects' ,'company_id');
    }

    public function leads() {
        return $this->hasMany('App\Customer_lead' ,'company_id');
    }

    public function moderators () {
        return $this->hasMany('App\CompaniesModerator' ,'company_id');
    }
    
    public function quotations() {
        return $this->hasMany('App\Quotation' ,'company_id');
    }
    
    public function proposal() {
        return $this->hasOne('App\Proposal' ,'company_id');
    }
}
