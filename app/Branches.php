<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{
    protected $fillable = ['name','company_id','address','location_name','location_credential','phone','email','facebook','twitter','instagram'];

    public function company ()
    {
    	return $this->belongsTo('App\Companies', 'company_id');
    }
}
