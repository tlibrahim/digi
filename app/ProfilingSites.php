<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilingSites extends Model
{
    protected $fillable = ['profiling_id' ,'content_id' ,'technology_id' ,'look_id' ,'link'];

    public function content() {
    	return $this->belongsTo('App\Content' ,'content_id');
    }

    public function technology() {
    	return $this->belongsTo('App\Technologies' ,'technology_id');
    }

    public function look() {
    	return $this->belongsTo('App\LookAndFeels' ,'look_id');
    }
}
