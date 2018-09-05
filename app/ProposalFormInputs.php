<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProposalFormInputs extends Model
{
    protected $fillable = ['input_title' ,'input_name_id' ,'proposal_form_id' ,'in_add_more'];

    public function input() {
    	return $this->belongsTo('App\InputNames' ,'input_name_id');
    }
}
