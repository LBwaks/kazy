<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Laravel\Scout\Searchable;
class Application extends Model
{
    use SoftDeletes;
    use sluggable;
    use Searchable;
    protected $dates =['deleted_at'];
    protected $fillable=['charge','duration','time','user_id','job_id','time_available'];

    public function sluggable(): array
    {
        return[
            'slug'=>['source'=>'charge'],
            // 'onUpdate'=>'true'
        ];
    }
    public function get(Type $var = null)
    {
        # code...
    }
    public function user()
  {
    return $this->belongsTo('App\User')->withDefault();
  }
  public function getUrlAttribute()
  {
      return route('applications.show',$this->slug);
  }




  public function job()
  {
    return $this->belongsTo('App\Job');
  }
  public function comments()
  {
      return $this->hasMany('App\Comment');
  }

  public function getCreatedDateAttribute()
  {
      return $this->created_at->diffForHumans();
  }
//   public function approve(Application $application){
//     $yes="Approved";
//     $this->approved=$application=$yes;;
//     $this->save();
//   }
  public function approved(Application $application){
    // dd($application);
    $otherApplications=Application::where('duration',$application->charge)->where('id','!=',$application->id);
    foreach($otherApplications as $app ){
        $app->update('approved','failrd');
    }

    $this->approved=$application="Approved";


   $this->update();
  }
//    public function failed(Application $application){
//         $otherApplications=Application::where('duration',$application->charge)->where('id','!=',$application->id);
//        $this->approved="Failed";
//        dd($otherApplications);
//        foreach($otherApplications as $app ){
//         $this->approved="Failed";
//         $app->update('approved','failed');
//     }
//    }
public function searchableAs()
    {
        return 'application_index';
    }
}
