<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable = ['name','button_title','button_icon' ,'service_id' ,'serialize_level'];

    public function positions() {
		return $this->hasMany('App\TaskPositions' ,'task_id');
	}

    public function services() {
		return $this->hasMany('App\TaskServices' ,'task_id');
	}

    public function service() {
		return $this->belongsTo('App\Services' ,'service_id');
	}

	public function inputs() {
		return $this->hasMany('App\TaskInputs' ,'task_id');
	}
}
