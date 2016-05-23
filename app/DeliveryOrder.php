<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryOrder extends Model
{
    //
    public $timestamp = true;
    protected $table = "delivery_order";

    public function po(){
    	return $this->belongsTo('App\PurchaseOrder','po_id');
    }

    public function detail_do(){
    	return $this->hasMany('App\DetailDO','do_id');
    }
}
