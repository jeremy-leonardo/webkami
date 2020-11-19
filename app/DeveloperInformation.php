<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeveloperInformation extends Model
{
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
