<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailDO extends Model
{
    //
     public $timestamps = false;
     protected $table = "detail_do";

     public function doo(){
     	return $this->belongsTo('App\DeliveryOrder','do_id');
     }

     public function product(){
    	return $this->belongsTo('App\Product','product_id');
    }
}
