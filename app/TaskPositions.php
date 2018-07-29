<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskPositions extends Model
{
    protected $fillable = ['task_id' ,'position_id'];

    public function position() {
    	return $this->belongsTo('App\Positions' ,'position_id');
    }
}
