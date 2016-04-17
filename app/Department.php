<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //

    public $timestamp = true;
    protected $table = "department";

    public function user(){
    	return $this->hasMany('App\User','dep_id');
    }
}
