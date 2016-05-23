<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public $timestamp = true;
    protected $table = "product";

    public function sub_category(){
    	return $this->belongsTo('App\Subcategory','sub_cat_id');
    }

    public function detail_ro(){
    	return $this->hasMany('App\DetailRO','product_id');
    }

    public function detail_po(){
    	return $this->hasMany('App\DetailPO','product_id');
    }

     public function detail_do(){
    	return $this->hasMany('App\DetailDO','product_id');
    }

    public function stock(){
    	return $this->hasMany('App\Stock','product_id');
    }

}
