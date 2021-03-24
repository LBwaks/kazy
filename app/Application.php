<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable=['charge','duration','time','user_id','job_id','time_available'];


    public function user()
  {
    return $this->belongsTo('App\User');
  }
  public function getUrlAttribute()
  {
      return route('application.show',$this->id);
  }

  public function job()
  {
    return $this->belongsTo('App\Job');
  }

  public function getCreatedDateAttribute()
  {
      return $this->created_at->diffForHumans();
  }
//   public function approve(Bid $bid){
//     $this->approved=$bid->{"Approved"};
//     $this->save();
//   }
  public function approvedApplication(Application $application){
  $yes="Approved";
    $this->approved=$application=$yes;
    // $updateBid=DB::table('bids')->where("bid",$bid)->update('approved','yes ')
    $this->save();
  }
}
