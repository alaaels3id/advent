<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Hash;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $guard = 'admin';
    
    protected $fillable = [
        'firstName', 'lastName', 'username', 'mobile', 'image', 'dob', 'location', 'jop', 'about', 'email', 'password', 'gender'
    ];

    protected $dates = [
        'dob', 'deleted_at'
    ];
    
    public function setPasswordAttribute($value){ 
    	$this->attributes['password'] = Hash::make($value); 
    }
    
    protected $hidden = [
    	'password', 'remember_token'
    ];

    public function products(){ 
        return $this->belongsToMany(Product::class)->withTimestamps(); 
    }
    
    public function post(){ 
        return $this->hasMany(Post::class); 
    }
}