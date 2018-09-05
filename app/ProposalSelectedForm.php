<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProposalSelectedForm extends Model
{
    protected $fillable = ['proposal_id' ,'form_id'];

    public function proposal() {
    	return $this->belongsTo('App\Proposal' ,'proposal_id');
    }

    public function form() {
    	return $this->belongsTo('App\ProposalForms' ,'form_id');
    }
}
