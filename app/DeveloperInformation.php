<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeveloperInformation extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'last_formal_education_level_id', 
        'last_formal_education_institution', 
        'last_formal_education_field_of_study', 
        'current_formal_education_level_id',
        'current_formal_education_institution',
        'current_formal_education_field_of_study',
        'other_education',
        'skills',
        'portfolio_link',
        'linkedin_link',
        'phone',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function lastFormalEducationLevel()
    {
        return $this->hasOne('App\EducationLevel', 'last_formal_education_level_id');
    }
    public function currentFormalEducationLevel()
    {
        return $this->hasOne('App\EducationLevel', 'current_formal_education_level_id');
    }
}
