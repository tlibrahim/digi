<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedbacks extends Model
{
    protected $fillable = ['values' ,'potential_id' ,'feedback_form_id'];

    public function feedback() {
    	return $this->belongsTo('App\FeedbackForms' ,'feedback_form_id');
    }
}
