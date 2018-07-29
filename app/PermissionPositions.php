<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionPositions extends Model
{
    protected $fillable = ['position_id' ,'permission_id'];

    public function position() {
    	return $this->belongsTo('App\Positions' ,'position_id');
    }

    public function permission() {
    	return $this->belongsTo('App\Permissions' ,'permission_id');
    }
}
