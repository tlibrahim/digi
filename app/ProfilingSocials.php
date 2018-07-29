<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilingSocials extends Model
{
    protected $fillable = ['profiling_id' ,'management_id' ,'post_type_id' ,'promote_status_id' ,'content_id' ,'name' ,'link' ,'campaign_link'];

    public function promote() {
    	return $this->belongsTo('App\PromoteStatus' ,'promote_status_id');
    }

    public function content() {
    	return $this->belongsTo('App\Content' ,'content_id');
    }

    public function manage() {
    	return $this->belongsTo('App\Management' ,'management_id');
    }

    public function post() {
    	return $this->belongsTo('App\PostTypes' ,'post_type_id');
    }
}
