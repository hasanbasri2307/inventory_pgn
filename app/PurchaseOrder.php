<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    //
    public $timestamp = true;
    protected $table = "purchase_order";

    public function vendor(){
    	return $this->belongsTo('App\Vendor','vendor_id');
    }

    public function ro(){
    	return $this->belongsTo('App\RequestOrder','ro_id');
    }

    public function createBy(){
    	return $this->belongsTo('App\User','created_by');
    }

    public function detail_po(){
    	return $this->hasMany('App\DetailPO','po_id');
    }

    public function doo(){
        return $this->hasMany('App\DeliveryOrder','po_id');
    }
}
