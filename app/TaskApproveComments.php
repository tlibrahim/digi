<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskApproveComments extends Model
{
    protected $fillable = ['comment' ,'user_decline_id' ,'task_assign_id' ,'type'];

    public function user() {
    	return $this->belongsTo('App\CrmUser' ,'user_decline_id');
    }

    public function task_assign() {
    	return $this->belongsTo('App\TaskAssign' ,'task_assign_id');
    }
}
