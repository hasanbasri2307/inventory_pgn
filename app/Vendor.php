<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    //
    public $timestamp = true;
    protected $table = "vendor";

    public function po(){
    	return $this->hasMany('App\PurchaseOrder','vendor_id');
    }
}
