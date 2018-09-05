<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $fillable = ['quotation_id' ,'type' ,'departement_id' ,'is_complete'];

    public function quotation() {
    	return $this->belongsTo('App\Quotation' ,'quotation_id');
    }

    public function proposal_data() {
    	return $this->hasMany('App\ProposalData' ,'proposal_id');
    }

    public function selectedForms() {
    	return $this->hasMany('App\ProposalSelectedForm' ,'proposal_id');
    }
}
