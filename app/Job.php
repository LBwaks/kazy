<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
 use Laravel\Scout\Searchable;

class Job extends Model
{
    use Searchable;
    use Sluggable;

    use SoftDeletes;
    protected $dates=['deleted_at','created_at','due'];
    protected $cast =[
        'due'=>'datetime:d-m-Y',
    ];

    protected $fillable=['reference','title','slug','description','location','address','due','photo','videos'];
    // protected $dates=['date'];

    public function sluggable(): array
    {
        return[
            'slug'=>['source'=>'title'],
            // 'onUpdate'=>'true'
        ];
    }
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
      return route('job.show',$this->slug);
  }

  public function images(){
      return $this->hasMany('App\Jobimage');
  }

  public function videos()
  {
     return $this->hasMany('App\Jobvideo');
  }
public function Comments(){
    return $this->hasMany('App\Comments');
}
  public function getCreatedDateAttribute()
  {
      return $this->created_at->diffForHumans();
    //   return $this->created_at->format('D ,j M Y , h:i a');
  }
//   public function getDueDateAttribute()
//   {
//       return $this->due->diffForHumans();
//     //   return $this->created_at->format('D ,j M Y , h:i a');
//   }




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

    /**
     * Searchable rules.
     *
     * @var array
     */
    // protected $searchable = [
    //     /**
    //      * Columns and their priority in search results.
    //      * Columns with higher values are more important.
    //      * Columns with equal values have equal importance.
    //      *
    //      * @var array
    //      */
    //     'columns' => [
    //         'users.name' => 10,
    //         // 'categories.job' => 10,
    //         'jobs.title' => 10,
    //         'jobs.reference' => 5,
    //         'jobs.description' => 5,
    //         'jobs.location' => 5,
    //         'jobs.address' => 5,

    //     ],
    //     'joins' => [
    //         'users' => ['users.id','users.id'],
    //     //     // 'posts' => ['users.id','posts.user_id'],
    //     //     // 'categories' => ['jobs.id','jobs.user_id'],
    //     ],
    // ];

    public function searchableAs()
    {
        return 'job_index';
    }
}
