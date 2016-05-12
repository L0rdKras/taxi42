<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    protected $table = 'movements';

	protected $fillable = ['ingress','egress'];

	public function Loans()
  {
      return $this->belongsToMany('App\Loan');
  }

  public function Pays()
  {
      return $this->belongsToMany('App\Pay');
  }
}
