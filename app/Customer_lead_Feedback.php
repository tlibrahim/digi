<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer_lead_Feedback extends Model
{
    protected $fillable = ['customer_lead_id','company_user_id','lead_status_feedback_id','date','description',];

    public function status ()
    {
    	return $this->belongsTo('App\Lead_Status_Feedback', 'lead_status_feedback_id');
    }
}
