<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerLeads extends Model
{
    protected $fillable = ['company_id' ,'project_id' ,'customer_type' ,'source' ,'name' ,'phone' ,'email' ,'message'];
}
