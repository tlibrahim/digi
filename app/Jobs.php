<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $name = 'cron_jobs';
	protected $fillable = ['title' ,'sub_title' ,'description'];
}
