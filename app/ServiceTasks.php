<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceTasks extends Model
{
	protected $fillable = ['task_id' ,'service_id'];

	public function task() {
		return $this->belongsTo('App\Tasks' ,'task_id');
	}

	public function service() {
		return $this->belongsTo('App\Services' ,'service_id');
	}
}
