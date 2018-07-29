<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer_lead extends Model
{
    protected $fillable = ['company_id','project_id','company_user_id','lead_source_id','need_type','name','phone','email','message',];

    public function project ()
    {
    	return $this->belongsTo('App\Projects', 'project_id');
    }

    public function user ()
    {
    	return $this->belongsTo('App\Company_User', 'company_user_id');
    }

    public function source ()
    {
    	return $this->belongsTo('App\Lead_Source', 'lead_source_id');
    }
}
