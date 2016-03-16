<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fondo extends Model
{
	protected $table = 'fondos';

	protected $fillable = ['name'];

	public function Accounts()
	{
		return $this->hasMany('App\Account');
	}
}
