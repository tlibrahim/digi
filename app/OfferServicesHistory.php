<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferServicesHistory extends Model
{
    protected $fillable = [ 'offer_id', 'service_id' ,'quantity'];
}
