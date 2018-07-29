<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanServices extends Model
{
    protected $fillable = ['plan_id' ,'service_id' ,'quantity'];

    public function plan() {
    	return $this->belongsTo('App\Plans' ,'plan_id');
    }

    public function service() {
    	return $this->belongsTo('App\Services' ,'service_id');
    }
}
