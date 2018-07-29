<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeetingFeedback extends Model
{
    protected $fillable = ['company_id' ,'notes' ,'date_time' ,'type'];
}
