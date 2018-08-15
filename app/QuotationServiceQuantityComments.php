<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotationServiceQuantityComments extends Model
{
    protected $fillable = ['q_q_s_id' ,'comment'];

    public function quotSerQnt() {
    	return $this->belongsTo('App\QuotationServiceQuantity' ,'q_q_s_id');
    }
}
