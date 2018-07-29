<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name'];

    public function positions() {
    	return $this->hasMany('App\Positions' ,'departement_id');
    }
}
