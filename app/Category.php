<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public $timestamp = true;
    protected $table = "category";

    public function sub_category(){
    	return $this->hasMany('App\Subcategory','cat_id');
    }
}
