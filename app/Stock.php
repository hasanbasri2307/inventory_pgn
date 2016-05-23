<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //
    public $timestamp = true;
    protected $table = "stock";

    public function dep(){
    	return $this->belongsTo('App\Department','dep_id');
    }

    public function prd(){
    	return $this->belongsTo('App\Product','product_id');
    }

    
}
