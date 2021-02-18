<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['category','slug','job','user_id'];
    // public function jobs()
    // {
    //   return $this->belongsToMany('App\Job');
    // }

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function getUrlAttribute()
  {
      return route('category.show',$this->id);
  }
  public function jobs()
    {
      return $this->belongsToMany('App\Job');
    }

}
