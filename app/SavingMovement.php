<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavingMovement extends Model
{
	protected $table = 'savingMovements';

	protected $fillable = ['type','amount','person_id'];

}
