<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class skill extends Model
{
    protected $fillable=['category','skills'];

    public function user()
    {
      return $this->hasMany('App\User');
    }
}
