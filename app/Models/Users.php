<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;

class Users extends Authenticatable{
    
    use Notifiable;
	protected $table = 'mncl_users';
    protected $fillable = [
        'name', 'email', 'password', 'status', 'role_id'
    ];
    protected $hidden = [
        'password'
    ];

    public function getRole(){
        return $this->hasOne('App\Model\Role', 'role_id', 'id');
    }

    public function setPasswordAttribute($password){ 
        return $this->attributes['password'] = Hash::make($password); 
    }
}
