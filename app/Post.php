<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Post extends Model
{
    use SoftDeletes; 
    
    protected $fillable = ['title', 'body', 'image', 'admin_id'];
    protected $dates = ['deleted_at'];

    public function users(){ return $this->belongsTo(Admin::class, 'admin_id'); }
    public function comment(){ return $this->hasMany(Comment::class); }
    public function tags(){ return $this->belongsToMany(Tag::class)->withTimestamps(); }
    public function scopeFilter($query, $filters){ 

        if($month = $filters->month){ $query->whereMonth('created_at', Carbon::parse($month)->month); }
        if($year = $filters->year){ $query->whereYear('created_at', $year); }
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) as year, monthname(created_at) as month, COUNT(*) as published')
        ->groupBy('year', 'month')->orderByRaw('min(created_at) desc')->get();
    }
}