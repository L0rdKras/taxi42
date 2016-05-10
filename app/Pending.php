<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pending extends Model
{
  protected $table = 'pendings';

  protected $fillable = ['date','amount','status','movil_id','account_id'];
}
