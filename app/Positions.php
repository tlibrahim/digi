<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Positions extends Model
{
	protected $fillable = ['name' ,'departement_id' ,'type'];

	public function departement() {
		return $this->belongsTo('App\Department' ,'departement_id');
	}

	public function tasks() {
		return $this->hasMany('App\Tasks' ,'position_id');
	}
}
