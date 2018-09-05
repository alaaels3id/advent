<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = ['size'];
    
    public function product()
    {
    	return $this->belongsToMany(Product::class)->withTimestamps();
    }
}
