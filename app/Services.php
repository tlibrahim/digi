<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
	protected $fillable = ['name'];

	public function tasks() {
		return $this->hasMany('App\ServiceTasks' ,'service_id');
	}

	public function subServices() {
		return $this->hasMany('App\SubServices' ,'service_id');
	}
}
