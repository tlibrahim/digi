<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotationServices extends Model
{
    protected $fillable = ['quotation_id' ,'service_id' ,'quantity'];

    public function service() {
    	return $this->belongsTo('App\Services' ,'service_id');
    }

    public function quotation() {
    	return $this->belongsTo('App\Quotation' ,'quotation_id');
    }
}
