<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
  protected $table = 'pays';

  protected $fillable = ['date','total','sheets','sheets_value','movil_id'];

  public function Movements()
  {
    return $this->belongsToMany('App\Movement');
  }
}
