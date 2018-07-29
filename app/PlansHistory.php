<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlansHistory extends Model
{
    protected $fillable = ['title' ,'description' ,'price' ,'plan_id' ,'transaction' ,'transaction_date'];

    public function plan() {
    	return $this->belongsTo('App\Plans' ,'plan_id');
    }
}
