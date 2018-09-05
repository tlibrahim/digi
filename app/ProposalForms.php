<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProposalForms extends Model
{
    protected $fillable = ['title' ,'icon' ,'susspend'];

    public function inputs() {
    	return $this->hasMany('App\ProposalFormInputs' ,'proposal_form_id');
    }
}
