<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
	use SoftDeletes;

	protected $fillable = [
		'custumer_id',
		'gov_id',
		'custumer_name',
		'tel',
		'state',
		'street',
		'products',
		'total'
	];

	protected $dates = ['deleted_at'];
}
