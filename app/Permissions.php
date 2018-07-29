<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    protected $fillable = ['trigger' ,'name' ,'trigger_category'];

    public function positions() {
    	return $this->hasMany('App\PermissionPositions' ,'permission_id');
    }
}
