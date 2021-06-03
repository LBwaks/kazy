<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use willvincent\Rateable\Rateable;
use Laravel\Scout\Searchable;
// use willvincent\Rateable
class User extends \TCG\Voyager\Models\User
{
    use Notifiable;
    use Rateable;
     use Searchable;
     use Rateable;

//    $ = User::first();
//    $rate->rateOnce();

    public function routeNotificationForNexmo()
    {
        return $this->tell;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_no','name', 'email', 'password','phone','location','address','dob', 'gender','avatar','terms','user_type','highest_education','other_education','experience','skills','cv_and_certificates'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function categories()
    {
      return $this->hasMany('App\Category');
    }

    public function jobs()
    {
       return $this->belongsTo('App\Job');
    }
    public function comments(){
        return $this->hasMany("App\Comment");
    }
public function applications(){
    return $this->hasManyThrough('App\application','App\Job');
}
public function tosearchableArray()
{
    return [
        'id' => $this->id,
        'name' => $this->name,
        'location' => $this->location
    ];
}
}
