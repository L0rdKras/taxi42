<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $table = 'loans';

	protected $fillable = ['amount','status','date','limit_date','person_id'];

	public function Movements()
    {
        return $this->belongsToMany('App\Movement');
    }

    public function Person(){
    	return $this->belongsTo('App\Person');
    }
}
