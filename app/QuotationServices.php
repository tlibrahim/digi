<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotationServices extends Model
{
    protected $fillable = ['quotation_id' ,'service_id' ,'quantity'];
}
