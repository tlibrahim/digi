<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskAssign extends Model
{
    protected $fillable = ['quotation_id' ,'user_id' ,'task_id' ,'end_date' ,'service_id' ,'serialize_level' ,'is_done'];

    public function user() {
    	return $this->belongsTo('App\CrmUser' ,'user_id');
    }

    public function task() {
    	return $this->belongsTo('App\Tasks' ,'task_id');
    }

    public function service() {
    	return $this->belongsTo('App\Services' ,'service_id');
    }

    public function quotation() {
        return $this->belongsTo('App\Quotation' ,'quotation_id');
    }

    public function executions() {
    	return $this->hasMany('App\TaskExecution' ,'task_assign_id');
    }
}
