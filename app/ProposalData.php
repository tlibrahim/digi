<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProposalData extends Model
{
    protected $fillable = ['input' ,'type' ,'value' ,'proposal_id' ,'form_id' ,'data_index'];

    public function form() {
    	return $this->belongsTo('App\ProposalForms' ,'form_id');
    }
}
