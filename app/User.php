<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

	public $timestamp = true;

    protected $fillable = [
        'name', 'email', 'password','role','dep_id','status_user'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function department(){
        return $this->belongsTo('App\Department','dep_id');
    }

    public function ro_req_by(){
        return $this->hasMany('App\RequestOrder','req_by');
    }

    public function ro_approve_by(){
        return $this->hasMany('App\RequestOrder','approved_by');
    }
}
