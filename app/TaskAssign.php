<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskAssign extends Model
{
    protected $fillable = ['client_plan_id' ,'user_id' ,'task_id' ,'end_date' ,'title' ,'description'];

    public function user() {
    	return $this->belongsTo('App\CrmUser' ,'user_id');
    }

    public function task() {
    	return $this->belongsTo('App\Tasks' ,'task_id');
    }
}
