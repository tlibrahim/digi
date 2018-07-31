<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $fillable = ['company_id' ,'type' ,'departement_id'];
}
