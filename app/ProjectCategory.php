<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    public function projectDetails()
    {
        return $this->hasMany('App\ProjectDetail', 'project_category_id');
    }
}
