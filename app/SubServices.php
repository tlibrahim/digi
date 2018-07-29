<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubServices extends Model
{
    protected $fillable = ['name' ,'service_id'];

    public function service() {
    	return $this->belongsTo('App\Services' ,'service_id');
    }

    public function values() {
    	return $this->hasMany('App\SubServiceValues' ,'sub_service_id');
    }
}
