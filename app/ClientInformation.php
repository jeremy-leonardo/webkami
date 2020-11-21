<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientInformation extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'company', 
        'description', 
        'field', 
        'phone',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
