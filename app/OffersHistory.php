<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OffersHistory extends Model
{
    protected $fillable = [ 'name', 'type', 'description', 'total', 'total_discount' ,'status' ,'is_deleted' ,'offer_type' ,'offer_id'];
}
