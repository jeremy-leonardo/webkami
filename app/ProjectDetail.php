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
        return $this->hasOne('App\ProjectCategory', 'project_category_id');
    }
    public function clientUser()
    {
        return $this->hasOne('App\User', 'client_user_id');
    }
}
