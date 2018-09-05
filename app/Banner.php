<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Banner extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'head', 'body', 'image', 'category_id'
    ];

    protected $dates = [
        'deleted_at'
    ];
}
