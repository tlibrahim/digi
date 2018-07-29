<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompaniesModerator extends Model
{
    protected $fillable = ['crm_user_id' ,'company_id' ,'start'];
}
