<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $fillable = ['name','company_id','location_name','location_credential','about','logo','downpayment','from_price','to_price','from_space','to_space','paymentfacility'];
}
