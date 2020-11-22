<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_developer', 'is_client'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function projectDetails()
    {
        return $this->hasMany('App\ProjectDetail', 'client_user_id');
    }

    public function clientInformation()
    {
        return $this->hasOne('App\ClientInformation', 'user_id');
    }
    
    public function developerInformation()
    {
        return $this->hasOne('App\DeveloperInformation', 'user_id');
    }
}
