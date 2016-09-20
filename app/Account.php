<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
	protected $table = 'accounts';

	protected $fillable = ['name','amount','type','renovate','exigible','init_date','finish_date','fondo_id'];

	public function Fondo()
	{
		return $this->belongsTo('App\Fondo');
	}

	public function movils()
    {
        return $this->belongsToMany('App\Movil');
    }
}
