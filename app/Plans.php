<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    protected $fillable = ['title' ,'description' ,'price' ,'industry_id' ,'status' ,'is_deleted'];

    public function services() {
    	return $this->hasMany('App\PlanServices' ,'plan_id');
    }

    public function industry() {
    	return $this->belongsTo('App\Industries' ,'industry_id');
    }
}
