<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectDetail extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'project_category_id',
        'deadline',
        'budget',
        'client_user_id',
    ];

    public function projectCategory()
    {
        return $this->belongsTo('App\ProjectCategory', 'project_category_id');
    }
    public function clientUser()
    {
        return $this->belongsTo('App\User', 'client_user_id');
    }
    public function project()
    {
        return $this->hasOne('App\Project', 'project_id');
    }
}
