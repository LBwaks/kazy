<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;
class User extends \TCG\Voyager\Models\User
{
    use Notifiable;
    use Searchable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_no','name', 'email', 'password','tell','location','address','dob', 'gender','profile_image','user_type','highest_education','other_education','experience','skills','cv_and_certificates'
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
       return $this->hasMany('App\Job');
    }
public function applications(){
    return $this->hasMany('App\application');
}
}
