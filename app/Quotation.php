<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $fillable = ['company_id' ,'total'];
    
    public function services() {
        return $this->hasMany('App\QuotationServices' ,'quotation_id');
    }
}
