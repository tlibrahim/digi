<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubServiceValues extends Model
{
    protected $fillable = ['value' ,'sub_service_id'];

    public function sub_service() {
    	return $this->belongsTo('App\SubServices' ,'sub_service_id');
    }
}
