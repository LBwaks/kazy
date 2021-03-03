<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Cviebrock\EloquentSluggable\Sluggable;

class Job extends Model
{
    // use Sluggable;
    protected $fillable=['reference','title','slug','description','location','address','due','photo','videos'];

    // public function sluggable()
    // {
    //     return[
    //         'slug'=>['source'=>'title'],
    //         'onUpdate'=>'true'
    //     ];
    // }
    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function categories()
    {
      return $this->belongsToMany('App\Category');
    }

    public function getUrlAttribute()
  {
      return route('job.show',$this->id);
  }

  public function images(){
      return $this->hasMany('App\Jobimage');
  }

  public function videos()
  {
     return $this->hasMany('App\Jobvideo');
  }

  public function getCreatedDateAttribute()
  {
      return $this->created_at->diffForHumans();
    //   return $this->created_at->format('D ,j M Y , h:i a');
  }

  public function applications()
  {
     return $this->hasMany('App\Application');
  }

  public function getFirstImageAttribute()
  {
      return $this->hasOne('App\Jobimage');
  }

  public function approvedApplication(Application $application)
  {
      $this->application_id=$application->id;
      $this->save();
  }

//   public function getDueDateAttribute()
//   {
//       return $this->due->diffForHumans();
//     //   return $this->created_at->format('D ,j M Y , h:i a');
//   }
}
