<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferPlansHistory extends Model
{
    protected $fillable = [ 'offer_id', 'plan_id'];
}
