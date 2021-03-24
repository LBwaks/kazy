<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class Category extends Model
{
    use Searchable;
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
