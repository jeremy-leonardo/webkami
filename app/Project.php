<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function projectDetail()
    {
        return $this->belongsTo('App\ProjectDetail', 'project_detail_id');
    }
    public function projectStatus()
    {
        return $this->belongsTo('App\ProjectStatus', 'project_status_id');
    }
    public function developerUser()
    {
        return $this->belongsTo('App\User', 'developer_user_id');
    }
}
