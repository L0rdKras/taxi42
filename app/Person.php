<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
	protected $table = 'persons';

	protected $fillable = ['rut','firstName','lastName','address','type'];
}
