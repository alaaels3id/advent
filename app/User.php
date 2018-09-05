<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Hash;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'firstName', 'lastName', 'username', 'mobile', 'image', 'dob', 'location', 'jop', 'role', 'about', 'email', 'password', 'gender'
    ];

    protected $dates = [
        'dob', 'deleted_at'
    ];
    
    protected $hidden = [
        'password', 'remember_token'
    ];
    
    public function contact(){ 
        return $this->hasMany(Contact::class); 
    }
    
    public function comment(){ 
        return $this->hasMany(Comment::class); 
    }
    
    public function reviews(){ 
        return $this->hasMany(Review::class); 
    }
    
    public function setPasswordAttribute($value){ 
        $this->attributes['password'] = Hash::make($value); 
    }
}
