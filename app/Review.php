<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['product_id', 'user_id', 'rate', 'review'];
    public function products(){ return $this->belongsTo(Product::class, 'product_id'); }
    public function users(){ return $this->belongsTo(User::class, 'user_id'); }
}
