<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferPlans extends Model
{
    protected $fillable = [ 'offer_id', 'plan_id'];

    public function offer() {
    	return $this->belongsTo('App\Offers' ,'offer_id');
    }

    public function plan() {
    	return $this->belongsTo('App\Plans' ,'plan_id');
    }
}
