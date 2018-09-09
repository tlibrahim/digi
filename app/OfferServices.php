<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferServices extends Model
{
    protected $fillable = [ 'offer_id', 'service_id' ,'quantity'];

    public function offer() {
    	return $this->belongsTo('App\Offers' ,'offer_id');
    }

    public function service() {
    	return $this->belongsTo('App\Services' ,'service_id');
    }
}
