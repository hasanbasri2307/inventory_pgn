<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestOrder extends Model
{
    //

    public $timestamp = true;
    protected $table = "request_order";

    public function detail_ro(){
    	return $this->hasMany("App\DetailRO","ro_id");
    }

    public function req_by(){
    	return $this->belongsTo('App\User','req_by');
    }

    public function approved_by(){
    	return $this->belongsTo('App\User','approved_by');
    }

    public function department(){
    	return $this->belongsTo('App\Department','dep_id');
    }
}
