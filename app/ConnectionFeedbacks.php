<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConnectionFeedbacks extends Model
{
    protected $fillable = ['values' ,'connection_id' ,'feedback_form_id'];

    public function feedback() {
    	return $this->belongsTo('App\FeedbackForms' ,'feedback_form_id');
    }
}
