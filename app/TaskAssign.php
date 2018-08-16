<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskAssign extends Model
{
    protected $fillable = [
        'quotation_id' ,'user_id' ,'task_id' ,
        'end_date' ,'service_id' ,'serialize_level' ,
        'is_done' ,'is_approved' ,'user_approved_id' ,
        'qnt_lvl' ,'q_q_s_id' ,'director_approve' ,'is_director_declined'];

    public function user() {
        return $this->belongsTo('App\CrmUser' ,'user_id');
    }

    public function userApprove() {
    	return $this->belongsTo('App\CrmUser' ,'user_approved_id');
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

    public function quotSerQnt() {
        return $this->belongsTo('App\QuotationServiceQuantity' ,'q_q_s_id');
    }

    public function executions() {
        return $this->hasMany('App\TaskExecution' ,'task_assign_id');
    }

    public function comments() {
    	return $this->hasMany('App\TaskApproveComments' ,'task_assign_id');
    }
}
