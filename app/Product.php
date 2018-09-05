<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes;

    protected $fillable = ['name', 'price', 'image', 'model', 'size', 'status', 'discription', 'category_id', 'qtn', 'brand'];
	
    protected $dates = ['deleted_at'];

    public function users()
    { 
        return $this->belongsToMany(Admin::class)->withTimestamps(); 
    }
    
    public function tags()
    { 
        return $this->belongsToMany(Tag::class)->withTimestamps(); 
    }
    
    public function sizes()
    { 
        return $this->belongsToMany(Size::class)->withTimestamps(); 
    }
    
    public function colors()
    { 
        return $this->belongsToMany(Color::class)->withTimestamps(); 
    }
    
    public function categories()
    { 
        return $this->belongsTo(Category::class, 'category_id'); 
    }
    
    public function reviews()
    { 
        return $this->hasMany(Review::class); 
    }

    public function scopeStatus($query){ return $query->where('status', 1); }
}
