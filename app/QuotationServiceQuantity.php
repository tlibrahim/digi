<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotationServiceQuantity extends Model
{
    protected $fillable = ['quotation_id' ,'service_id' ,'qnt_lvl' ,'completed' ,'is_approved'];

    public function quotation() {
    	return $this->belongsTo('App\Quotation' ,'quotation_id');
    }

    public function service() {
    	return $this->belongsTo('App\Services' ,'service_id');
    }

    public function comments() {
    	return $this->hasMany('App\QuotationServiceQuantityComments' ,'q_q_s_id');
    }
}
