<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RouteSheet extends Model
{
  protected $table = 'route_sheet';

  protected $fillable = ['amount'];
}
