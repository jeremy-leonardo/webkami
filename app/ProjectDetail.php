<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectDetail extends Model
{
    public function projectCategory()
    {
        return $this->hasOne('App\ProjectCategory', 'project_category_id');
    }
    public function clientUser()
    {
        return $this->hasOne('App\User', 'client_user_id');
    }
}
