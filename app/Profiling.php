<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profiling extends Model
{
    protected $fillable = ['potential_id' ,'logo' ,'approach' ,'intro' ,'seo_check' ,'seo_level_id' ,'seo_keywords' ,'sem_check' ,'sem_level_id' ,'sem_keywords' ,'gdn_check' ,'gdn_level_id' ,'gdn_keywords'];

    public function SetLogoAttribute($file) {
    	if ( is_file($file) ) {
    		$name = str_random(8).'-logo.'.$file->getClientOriginalExtension();
    		$file->storeAs('public/profiling-logos' ,$name);
    	} else {
    		$name = null;
    	}
    	$this->attributes['logo'] = $name;
    }

    public function products(){
    	return $this->hasMany('App\ProfilingProd' ,'profiling_id');
    }

    public function sites(){
    	return $this->hasMany('App\ProfilingSites' ,'profiling_id');
    }

    public function refs(){
    	return $this->hasMany('App\ProfilingRef' ,'profiling_id');
    }

    public function socials(){
    	return $this->hasMany('App\ProfilingSocials' ,'profiling_id');
    }

    public function seo_level() {
        return $this->belongsTo('App\Levels' ,'seo_level_id');
    }

    public function sem_level() {
        return $this->belongsTo('App\Levels' ,'sem_level_id');
    }

    public function gdn_level() {
        return $this->belongsTo('App\Levels' ,'gdn_level_id');
    }
}
