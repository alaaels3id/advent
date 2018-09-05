<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    protected $fillable = [
        'co_name', 'co_email', 'co_subject', 'co_message', 'co_view', 'co_type', 'image'
    ];

    public function user()
    {
        $this->belongTo(User::class);
    }
}
