<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movil extends Model
{
	protected $table = 'movils';

	protected $fillable = ['plate','mark','model','person_id'];

	public function Person()
	{
		return $this->belongsTo('App\Person');
	}

	public function Pendings()
	{
		return $this->hasMany('App\Pending');
	}
}
