<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movil extends Model
{
	protected $table = 'movils';

	protected $fillable = ['plate','mark','model','person_id'];
}
