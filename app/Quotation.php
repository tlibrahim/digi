<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $fillable = ['company_id' ,'total' ,'with_contract' ,'total_offer' ,'is_collected' ,'collect_date'];
    
    public function services() {
        return $this->hasMany('App\QuotationServices' ,'quotation_id');
    }

    public function company() {
    	return $this->belongsTo('App\Companies' ,'company_id');
    }

    public function contract() {
    	return $this->hasOne('App\Contracts' ,'quotation_id');
    }
}
