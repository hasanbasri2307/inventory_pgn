<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    //
    public $timestamp = true;
    protected $table = "sub_category";

    public function category(){
    	return $this->belongsTo('App\Category','cat_id');
    }

    public function product(){
    	return $this->hasMany('App\Product','sub_cat_id');
    }
}
