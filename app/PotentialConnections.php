<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PotentialConnections extends Model
{
    protected $fillable = ['potential_id' ,'firstname' ,'lastname' ,'companyname' ,'position' ,'phone' ,'address' ,'email'];

    public function potential() {
        return $this->belongsTo('App\Potentials' ,'potential_id');
    }
}
