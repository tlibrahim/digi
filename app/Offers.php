<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    protected $fillable = [ 'name', 'type', 'description', 'total', 'total_discount' ,'status' ,'is_deleted' ,'offer_type'];

    public function plans() {
    	return $this->hasMany('App\OfferPlans' ,'offer_id');
    }

    public function services() {
    	return $this->hasMany('App\OfferServices' ,'offer_id');
    }
}
