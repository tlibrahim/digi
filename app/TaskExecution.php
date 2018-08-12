<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskExecution extends Model
{
    protected $fillable = ['task_assign_id' ,'input' ,'value' ,'type'];

    public function task_assign() {
    	return $this->belongsTo('App\TaskAssign' ,'task_assign_id');
    }
}
