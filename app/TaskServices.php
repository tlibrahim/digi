<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskServices extends Model
{
    protected $fillable = ['task_id' ,'service_id'];

    public function position() {
    	return $this->belongsTo('App\Services' ,'service_id');
    }
}
