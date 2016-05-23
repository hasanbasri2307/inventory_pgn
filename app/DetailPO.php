<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPO extends Model
{
    //
    public $timestamps = false;
    protected $table = "detail_po";

    public function po(){
    	return $this->belongsTo('App\PurchaseOrder','po_id');
    }

    public function product(){
    	return $this->belongsTo('App\Product','product_id');
    }
}
