<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskInputs extends Model
{
	protected $fillable = ['input_title' ,'task_id' ,'input_name_id'];

	public function task() {
		return $this->belongsTo('App\Tasks' ,'task_id');
	}
	
	public function input() {
		return $this->belongsTo('App\InputNames' ,'input_name_id');
	}
}
