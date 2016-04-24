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

    public function user(){
    	return $this->belongsTo('App\User','req_by');
    }

    public function user_approve(){
    	return $this->belongsTo('App\User','approved_by');
    }

    public function department(){
    	return $this->belongsTo('App\Department','dep_id');
    }
}
