<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
	protected $table = 'persons';

	protected $fillable = ['rut','firstName','lastName','address','city','type'];

	public function accounts()
    {
        return $this->belongsToMany('App\Account');
    }

    public function savingMovements()
    {
        return $this->hasMany('App\SavingMovement');
    }
}
