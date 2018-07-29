<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    protected $fillable = ['title' ,'description' ,'price'];

    public function services() {
    	return $this->hasMany('App\PlanServices' ,'plan_id');
    }
}
