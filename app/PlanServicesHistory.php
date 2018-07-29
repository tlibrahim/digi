<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanServicesHistory extends Model
{
    protected $fillable = ['plan_history_id' ,'service_id' ,'quantity'];

    public function plan() {
    	return $this->belongsTo('App\PlansHistory' ,'plan_history_id');
    }

    public function service() {
    	return $this->belongsTo('App\Services' ,'service_id');
    }
}
