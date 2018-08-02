<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contracts extends Model
{
    protected $fillable = ['is_signed' ,'pdf' ,'quotation_id'];

    public function SetPdfAttribute($p) {
    	if (is_file($p)) {
    		$name = str_random(8).'-contract-pdf.'.$p->getClientOriginalExtension();
    		$p->storeAs('public/contracts' ,$name);
    	} else {
    		$name = NULL;
    	}
    	$this->attributes['pdf'] = $name;
    }

    public function quotation() {
    	return $this->belongsTo('App\Quotation' ,'quotation_id');
    }
}
