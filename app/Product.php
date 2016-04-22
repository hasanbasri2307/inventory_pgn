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
    	return $this->hasMany('App\DetailPO','product_id');
    }
}
