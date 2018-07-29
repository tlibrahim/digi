<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPositions extends Model
{
    protected $fillable = ['user_id' ,'position_id'];

    public function position() {
    	return $this->belongsTo('App\Positions' ,'position_id');
    }

    public function user() {
    	return $this->belongsTo('App\CrmUser' ,'user_id');
    }
}
