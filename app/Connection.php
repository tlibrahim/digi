<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    protected $fillable = ['name' ,'company_name' ,'position' ,'phone' ,'email' ,'connection_reference_id' ,'related_type' ,'related_type_id' ,'is_deleted'];

    public function reference() {
    	return $this->belongsTo('App\ConnectionReferences' ,'connection_reference_id');
    }

    public function feedbacks() {
        return $this->hasMany('App\ConnectionFeedbacks' ,'connection_id');
    }
}
