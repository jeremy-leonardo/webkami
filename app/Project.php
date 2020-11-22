<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_detail_id',
        'project_status_id',
        'developer_user_id',
    ];

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
