<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobvideo extends Model
{
  public function jobs()
  {
    return $this->belongsTo('App\Job');
  }
}
