<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailRO extends Model
{
    //
    public $timestamp= false;
    protected $table = "detail_ro";

    public function ro(){
    	return $this->belongsTo('App\RequestOrder','ro_id');
    }

    public function product(){
    	return $this->belongsTo('App\Product','product_id');
    }
}
