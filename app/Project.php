<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function projectDetail()
    {
        return $this->hasOne('App\ProjectDetail', 'project_detail_id');
    }
    public function projectStatus()
    {
        return $this->hasOne('App\ProjectStatus', 'project_status_id');
    }
    public function developerUser()
    {
        return $this->hasOne('App\User', 'developer_user_id');
    }
}
