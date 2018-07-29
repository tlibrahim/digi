<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_Unit_Type extends Model
{
    protected $fillable = ['unit_type_id','project_id'];

    public function project ()
    {
    	return $this->belongsTo('App\Projects', 'project_id');
    }

    public function unittype ()
    {
    	return $this->belongsTo('App\Unit_Type', 'unit_type_id');
    }
}
