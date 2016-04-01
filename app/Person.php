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

    public function totalIncome()
    {
        return $this->savingMovements()->where('type','Ingreso')->sum('amount');
    }

    public function totalEgress()
    {
        return $this->savingMovements()->where('type','Egreso')->sum('amount');
    }

    public function totalsaving()
    {
        return $this->totalIncome() - $this->totalEgress();
    }
}
