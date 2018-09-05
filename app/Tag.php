<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function post(){ $this->belongsToMany(Post::class)->withTimestamps(); }
    public function products(){ $this->belongsToMany(Product::class)->withTimestamps(); }
}
